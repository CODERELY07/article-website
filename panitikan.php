<?php
include('db.php');

$type = isset($_GET['type']) ? $_GET['type'] : '';

// Fetch category_id
$categoryStmt = $conn->prepare("SELECT id FROM categories WHERE name = ?");
$categoryStmt->bind_param("s", $type);
$categoryStmt->execute();
$categoryResult = $categoryStmt->get_result();

$panitikanItems = [];

if ($categoryRow = $categoryResult->fetch_assoc()) {
    $category_id = $categoryRow['id'];

    $stmt = $conn->prepare("SELECT id, title, author, publish_date, content, banner_image, created_at FROM panitikan WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $panitikanItems[] = $row;
    }

    $stmt->close();
}

$categoryStmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIBOL</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="bg-white dark:bg-gray-900">
    <?php include('./components/navbar.php');?>
    <div class="bg-white dark:bg-gray-900 min-h-screen flex flex-col justify-between">
    <div id="navbar-container"></div>

    <main class="bg-white dark:bg-gray-900 pt-20 mx-auto w-full max-w-screen-xl px-2 pb-4">
        <h1 class="m-4 my-8 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl dark:text-white text-center">
        <?= htmlspecialchars($type) ?>
        </h1>

        <hr class="my-8 border-gray-200 sm:mx-auto dark:border-gray-600" />

        <div class="container mx-auto px-4 py-4 pb-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($panitikanItems as $item): ?>
          <a href="panitikan_view.php?id=<?= $item['id'] ?>" class="block bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden hover:scale-101 transition-transform duration-300 ease-in-out">
                <img class="w-full h-60 object-cover" src="<?= htmlspecialchars($item['banner_image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" />
                <div class="p-6 md:p-8">
                    <div class="flex items-center justify-between text-gray-500 text-sm mb-4">
                        <span><?= htmlspecialchars($item['author']) ?></span>
                        <span><?= date("F j, Y", strtotime($item['created_at'])) ?></span>
                    </div>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <?= htmlspecialchars($item['title']) ?>
                    </h5>
                    <p class="text-gray-700 dark:text-gray-400 text-md">
                        <?= mb_strimwidth(strip_tags($item['content']), 0, 250, '...') ?>
                    </p>
                </div>
            </a>
        <?php endforeach; ?>
        </div>
    </main>
    </div>
       <?php include("./components/footer.php") ?>
     <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        document.querySelectorAll('#preloader .loader p span').forEach((span, index) => {
        span.style.setProperty('--i', index); 
        });

        setTimeout(() => {
        document.getElementById('preloader').classList.add('hidden');
        
        setTimeout(() => {
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('preloader').classList.remove('hidden');
            document.getElementById('main-content').style.display = 'block'; 
        }, 1000); 
        }, 3000); 
    </script>
</body>
