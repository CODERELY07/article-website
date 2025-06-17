<?php
require_once 'db.php';

function sanitizeInput($data)
{
    global $conn;
    return htmlspecialchars(strip_tags($conn->real_escape_string($data)));
}

function sanitizeHtml($html) {
    $allowedTags = '<p><a><strong><em><u><h1><h2><h3><h4><h5><h6><blockquote><ul><ol><li><img><br><hr><code><pre>';
    $html = strip_tags($html, $allowedTags);
    
    $html = preg_replace_callback('/<[^>]+>/', function($matches) {
        $tag = $matches[0];
        $tag = preg_replace('/\s+on\w+\s*=\s*["\'][^"\']*["\']/i', '', $tag);
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

// ✅ Fetch a single Panitikan entry with category name
function getPanitikanById($id)
{
    global $conn;
    $stmt = $conn->prepare("
        SELECT panitikan.*, categories.name AS category_name 
        FROM panitikan 
        JOIN categories ON panitikan.category_id = categories.id 
        WHERE panitikan.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// ✅ Get all Panitikan entries with category names
function getAllPanitikan()
{
    global $conn;
    $stmt = $conn->prepare("
        SELECT panitikan.*, categories.name AS category_name 
        FROM panitikan 
        JOIN categories ON panitikan.category_id = categories.id 
        ORDER BY panitikan.created_at DESC");
    $stmt->execute();
    return $stmt->get_result();
}

// ✅ Get Panitikan by Category Name (like 'MAIKLING KUWENTO')
function getPanitikanByCategory($categoryName)
{
    global $conn;
    $stmt = $conn->prepare("
        SELECT panitikan.*, categories.name AS category_name 
        FROM panitikan 
        JOIN categories ON panitikan.category_id = categories.id 
        WHERE categories.name = ?
        ORDER BY panitikan.created_at DESC");
    $stmt->bind_param("s", $categoryName);
    $stmt->execute();
    return $stmt->get_result();
}

// ✅ Optional: Get all categories
function getAllCategories()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM categories ORDER BY name ASC");
    $stmt->execute();
    return $stmt->get_result();
}
?>
