<?php
require_once 'functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$postId = sanitizeInput($_GET['id']);
$post = getPostById($postId);

if (!$post) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Styles for Quill-generated content */
        .ql-editor {
            padding: 0;
        }

        .ql-editor h1,
        .ql-editor h2,
        .ql-editor h3 {
            margin-top: 1em;
            margin-bottom: 0.5em;
        }

        .ql-editor p {
            margin-bottom: 1em;
        }

        .ql-editor img {
            max-width: 100%;
            height: auto;
        }

        .ql-editor blockquote {
            border-left: 4px solid #ccc;
            margin: 0.5em 0;
            padding-left: 1rem;
            font-style: italic;
        }

        .ql-editor pre {
            background-color: #f5f5f5;
            color: #333;
            padding: 1rem;
            border-radius: 0.25rem;
            overflow-x: auto;
            font-family: monospace, monospace;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        .dark .ql-editor pre {
            background-color: #374151;
            color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-300 antialiased">
    <div class="max-w-3xl mx-auto p-6">
        <a href="index.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Back to Home</a>

        <div class="bg-white dark:bg-gray-800 shadow rounded-md p-6">
            <?php if (!empty($post['banner_image'])): ?>
                <div class="mb-6 rounded-md overflow-hidden">
                    <img src="<?php echo htmlspecialchars($post['banner_image']); ?>" alt="Post banner" class="w-full h-full">
                </div>
            <?php endif; ?>

            <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-3"><?php echo htmlspecialchars($post['title']); ?></h1>

            <div class="text-gray-600 dark:text-gray-400 text-sm mb-4 flex items-center">
                <img src="<?php echo htmlspecialchars($post['profile_picture'] ?? 'default.png'); ?>" class="w-8 h-8 rounded-full mr-2" alt="Profile">
                <span><?php echo htmlspecialchars($post['username']); ?></span>
                <span class="ml-auto">Posted on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                <?php if ($post['created_at'] != $post['updated_at']): ?>
                    <span class="italic ml-2">(Updated on <?php echo date('F j, Y', strtotime($post['updated_at'])); ?>)</span>
                <?php endif; ?>
            </div>

            <div class="post-content ql-editor text-gray-700 dark:text-gray-300 leading-relaxed">
                <?php echo $post['content']; ?>
            </div>

            <?php if (isLoggedIn() && $_SESSION['user_id'] == $post['user_id']): ?>
                <div class="mt-6 space-x-2">
                    <a href="edit_post.php?id=<?php echo $post['id']; ?>" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded text-sm">Edit</a>
                    <a href="delete_post.php?id=<?php echo $post['id']; ?>" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php include("./components/footer.php") ?>
    <script>
        // Dark mode toggle (optional, for demonstration)
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</body>
</html>
