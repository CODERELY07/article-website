<?php
    require_once 'functions.php';
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit();
    }

    $postId = sanitizeInput($_GET['id']);
    $post = getPanitikanById($postId);

    if (!$post) {
        header("Location: index.php");
        exit();
    }
?>
<?php include("./components/head.php")?>
    <div class="max-w-3xl mx-auto p-6">
        <a href="my_posts.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Back</a>

        <div class="bg-white dark:bg-gray-800 shadow rounded-md p-6">
            <?php if (!empty($post['banner_image'])): ?>
                <div class="mb-6 rounded-md mx-auto w-100 h-100 overflow-hidden">
                    <img src="<?php echo htmlspecialchars($post['banner_image']); ?>" alt="Post banner" class="object-cover">
                </div>
            <?php endif; ?>

            <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-3"><?php echo htmlspecialchars($post['title']); ?></h1>

            <div class="text-gray-600 dark:text-gray-400 text-sm mb-4 flex items-center">
                <span><?php echo htmlspecialchars($post['author']); ?></span>
                <span class="ml-auto">Posted on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                <?php if ($post['created_at'] != $post['updated_at']): ?>
                    <span class="italic ml-2">(Updated on <?php echo date('F j, Y', strtotime($post['updated_at'])); ?>)</span>
                <?php endif; ?>
            </div>

            <div class="post-content ql-editor text-gray-700 dark:text-gray-300 leading-relaxed">
                <?php echo $post['content']; ?>
            </div>

            <!-- <?php if (isLoggedIn()): ?>
                <div class="mt-6 space-x-2">
                    <a href="edit_post.php?id=<?php echo $post['id']; ?>" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded text-sm">Edit</a>
                    <a href="delete_post.php?id=<?php echo $post['id']; ?>" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                </div>
            <?php endif; ?> -->
        </div>
    </div>
    <?php include("./components/footer.php") ?>