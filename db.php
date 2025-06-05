<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'blog_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    profile_picture VARCHAR(255),
    verification_code VARCHAR(255),
    is_verified VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

$createPostsTable = "CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    banner_image VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$createRegistrationLogsTable = "CREATE TABLE IF NOT EXISTS registration_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createUsersTable)) {
    die("Error creating users table: " . $conn->error);
}
if (!$conn->query($createRegistrationLogsTable)) {
    die("Error creating logs table: " . $conn->error);
}

if (!$conn->query($createPostsTable)) {
    die("Error creating posts table: " . $conn->error);
}

session_start();
?>