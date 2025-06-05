<?php
require_once 'db.php';

function sanitizeInput($data)
{
    global $conn;
    return htmlspecialchars(strip_tags($conn->real_escape_string($data)));
}

function sanitizeHtml($html) {
    // Basic HTML sanitizer - allow safe tags
    $allowedTags = '<p><a><strong><em><u><h1><h2><h3><h4><h5><h6><blockquote><ul><ol><li><img><br><hr><code><pre>';
    $html = strip_tags($html, $allowedTags);
    
    // Prevent XSS in attributes
    $html = preg_replace_callback('/<[^>]+>/', function($matches) {
        $tag = $matches[0];
        // Remove any attributes that start with "on" (like onclick, onload, etc.)
        $tag = preg_replace('/\s+on\w+\s*=\s*["\'][^"\']*["\']/i', '', $tag);
        // Remove javascript: and data: protocols from href/src attributes
        $tag = preg_replace('/\s+(href|src)\s*=\s*["\'](javascript|data):[^"\']*["\']/i', '', $tag);
        return $tag;
    }, $html);
    
    return $html;
}

function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}


function getUserById($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getPostById($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT posts.*, users.username, users.profile_picture 
                           FROM posts 
                           JOIN users ON posts.user_id = users.id 
                           WHERE posts.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getAllPosts()
{
    global $conn;
    $stmt = $conn->prepare("SELECT posts.*, users.username, users.profile_picture 
                           FROM posts 
                           JOIN users ON posts.user_id = users.id 
                           ORDER BY posts.created_at DESC");
    $stmt->execute();
    return $stmt->get_result();
}

function getUserPosts($userId)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    return $stmt->get_result();
}


?>
