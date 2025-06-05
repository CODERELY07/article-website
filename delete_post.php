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

// Verify post exists and belongs to user
$stmt = $conn->prepare("SELECT user_id FROM posts WHERE id = ?");
$stmt->bind_param("i", $postId);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if (!$post || $post['user_id'] != $_SESSION['user_id']) {
    header("Location: my_posts.php");
    exit();
}

// Delete the post
$stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
$stmt->bind_param("i", $postId);
$stmt->execute();

header("Location: my_posts.php");
exit();
