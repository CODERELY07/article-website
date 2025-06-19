<?php
include('db.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $conn->prepare("SELECT title, author, content FROM panitikan WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- 👈 ADD THIS -->
    <title><?= htmlspecialchars($row['title']) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900 min-h-screen flex flex-col justify-between text-gray-800 dark:text-gray-300">

    <!-- Navbar -->
    <?php include('./components/navbar.php'); ?>


    <!-- Main Content -->
    <main class="bg-white pt-20 dark:bg-gray-900 pt-25 mx-auto w-full max-w-screen-xl px-2 pb-4">

        <!-- Back Button -->
        <!-- <div class="container font-bold w-fit px-4 py-2 text-white mb-10 bg-gray-700 rounded-2xl shadow-md text-center text-sm ms-2">
            <a href="./../panitikan/tula.html">
                <span class="cursor-pointer hover:text-blue-400">
                    <i class="fa-solid fa-arrow-left"></i>&ensp;Tula
                </span>
            </a>
        </div> -->

        <!-- Title & Author -->
        <div class="m-4 my-5">
            <h3 class="text-4xl mb-4 font-extrabold tracking-tight leading-none text-gray-900 dark:text-white text-center">
                <?= htmlspecialchars($row['title']) ?>
            </h3>
            <p class="text-sm tracking-tight leading-none text-gray-700 dark:text-gray-300 text-center">
                ni: <?= htmlspecialchars($row['author']) ?>
            </p>
        </div>

        <!-- Divider -->
        <hr class="my-8 border-gray-200 sm:mx-auto dark:border-gray-600" />

        <!-- Dynamic Content -->
        <div class="container mx-auto max-w-4xl px-6 text-md">
            <div class="mb-5 text-gray-700 dark:text-gray-100 leading-7">
                <?= nl2br($row['content']) ?>
            </div>
        </div>

        <!-- Ending -->
        <p class="my-5 text-gray-500 text-center dark:text-gray-400 text-2xl pt-5 pb-10">
            Wakas.
        </p>

       
    </main>

    <?php include('./components/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
<?php
else:
    echo "Content not found.";
endif;

$stmt->close();
$conn->close();
?>
