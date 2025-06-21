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

function getAllCategories()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM categories ORDER BY name ASC");
    $stmt->execute();
    return $stmt->get_result();
}

function createAdmin(){
    global $conn;
    
    $username = "admin";
    $email = "admin@gmail.com";
    $password = "admincreate123";

    // check if user is alreay exist
    $adminExist = $conn->prepare("SELECT email from users WHERE email = ?");
    $adminExist->bind_param("s", $email);
    $adminExist->execute();

    $result = $adminExist->get_result();

    if($result->num_rows > 0){
        return;
    }
    
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users(username, email, password) VALUES(?, ?, ?) ");
    $stmt->bind_param("sss",$username, $email, $password_hash);

    $stmt->execute();
}

createAdmin();
?>
