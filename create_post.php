<?php
require_once 'functions.php';

if (!isLoggedIn()) {
    header("Location: ./index.php");
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = sanitizeInput($_POST['title']);
    $content = $_POST['content'];

    if (empty($title) || empty($content)) {
        $error = "Title and content are required";
    } else {
        // Sanitize HTML content
        $cleanContent = sanitizeHtml($content);

        $bannerImage = '';
        if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/banners/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            $fileType = $_FILES['banner']['type'];

            if (in_array($fileType, $allowedTypes)) {
                $fileExt = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
                $fileName = 'banner_' . uniqid() . '.' . $fileExt;
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['banner']['tmp_name'], $targetPath)) {
                    $bannerImage = $targetPath;
                }
            }
        }

        $userId = $_SESSION['user_id'];
        $stmt = $conn->prepare("INSERT INTO posts (user_id, title, content, banner_image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $userId, $title, $cleanContent, $bannerImage);

        if ($stmt->execute()) {
            header("Location: post.php?id=" . $stmt->insert_id);
            exit();
        } else {
            $error = "Error creating post. Please try again.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .ql-container {
            @apply border dark:border-gray-700 rounded-b-md;
        }

        .ql-toolbar {
            @apply border dark:border-gray-700 rounded-t-md bg-gray-100 dark:bg-gray-800;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-300 antialiased">
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4 dark:text-white">Create New Post</h1>
        <a href="index.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Back to Home</a>

        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline"><?php echo $error; ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" id="postForm" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="banner" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Banner Image</label>
                <input type="file" id="banner" name="banner" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                <?php if (isset($post['banner_image']) && !empty($post['banner_image'])): ?>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Current banner: <img src="<?php echo htmlspecialchars($post['banner_image']); ?>" style="max-width: 200px;" class="mt-2 rounded"></p>
                <?php endif; ?>
            </div>
            <div>
                <label for="title" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="content" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Content</label>
                <div id="editor" class="bg-white dark:bg-gray-800 rounded-b-md"></div>
                <input type="hidden" name="content" id="content">
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Post</button>
        </form>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],
            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction
            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults
            [{
                'font': []
            }],
            [{
                'align': []
            }],
            ['link', 'image', 'video'],
            ['clean'] // remove formatting
        ];

        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Write your post content here...'
        });

        // Handle form submission
        document.getElementById('postForm').onsubmit = function() {
            // Get HTML content from Quill
            const content = document.querySelector('#editor .ql-editor').innerHTML;
            document.getElementById('content').value = content;
            return true;
        };

        // Add image handler to Quill
        quill.getModule('toolbar').addHandler('image', function() {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.click();

            input.onchange = async function() {
                const file = input.files[0];
                if (!file) return;

                // Create form data
                const formData = new FormData();
                formData.append('image', file);

                try {
                    // Upload image to server
                    const response = await fetch('upload_image.php', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json();

                    if (result.success) {
                        // Insert image into editor
                        const range = quill.getSelection();
                        quill.insertEmbed(range.index, 'image', result.url);
                    } else {
                        alert('Error uploading image: ' + result.message);
                    }
                } catch (error) {
                    alert('Error uploading image: ' + error.message);
                }
            };
        });

        // Dark mode toggle (optional, for demonstration)
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</body>

</html>