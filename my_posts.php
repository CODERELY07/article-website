<?php
    require_once 'functions.php';
    $title = "My Posts";
    
    if (!isLoggedIn()) {
        header("Location: signup.php");
        exit();
    }


    $userId = $_SESSION['user_id'];
    $posts = getAllPanitikan();
    
?>
<?php include('./components/head.php')?>
<?php include('./components/navbar.php');?>
<?php include('./components/preloader.php')?>
    <div class=" p-6">
        <h1 class="text-2xl font-semibold mb-4 dark:text-white">My Posts</h1>
        <div class="mb-4 space-x-2">
            <a href="index.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Home</a>
            <a href="create_post.php" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create New Post</a>
            <a href="logout.php" class="btn inline-block bg-black hover:bg-black text-white font-bold py-2 px-4 rounded mt-10 dark:bg-white dark:text-black">Logout</a>
        </div>

        <?php if ($posts->num_rows === 0): ?>
            <p class="text-gray-600 dark:text-gray-400">You haven't created any posts yet.</p>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4 py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                <?php while ($post = $posts->fetch_assoc()): ?>
                    <div class="bg-white dark:bg-gray-800 shadow rounded-md p-4">
                        <?php if (!empty($post['banner_image'])): ?>
                            <div class="mb-4 rounded-md  h-70 w-100  mx-auto overflow-hidden">
                                <img src="<?php echo htmlspecialchars($post['banner_image']); ?>" alt="Post banner" class="object-cover">
                            </div>
                        <?php endif; ?>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                            <a href="post.php?id=<?php echo $post['id']; ?>" class="hover:underline">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </a>
                        </h2>
                        <div class="text-gray-600 dark:text-gray-400 text-sm mb-3">
                            Posted on <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                            <?php if ($post['created_at'] != $post['updated_at']): ?>
                                <span class="italic">(Updated on <?php echo date('F j, Y', strtotime($post['updated_at'])); ?>)</span>
                            <?php endif; ?>
                        </div>
                        <div class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            <?php
                            $excerpt = strip_tags($post['content']);
                            $excerpt = substr($excerpt, 0, 200);
                            echo htmlspecialchars($excerpt);
                            if (strlen($post['content']) > 200) echo '...';
                            ?>
                            <a href="post.php?id=<?php echo $post['id']; ?>" class="text-blue-500 hover:underline">Read more</a>
                        </div>
                        <div class="space-x-2">
                            <a href="edit_post.php?id=<?php echo $post['id']; ?>" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded text-sm">Edit</a>
                            <a href="delete_post.php?id=<?php echo $post['id']; ?>" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php include("./components/footer.php");?>