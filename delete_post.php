<?php
require_once 'functions.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: my_posts.php");
    exit();
}

$postId = sanitizeInput($_GET['id']);

// Delete the post
$stmt = $conn->prepare("DELETE FROM panitikan WHERE id = ?");
$stmt->bind_param("i", $postId);
$stmt->execute();

header("Location: my_posts.php");
exit();
