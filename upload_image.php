<?php
require_once 'functions.php';

if (!isLoggedIn()) {
    header('HTTP/1.1 403 Forbidden');
    echo json_encode(['success' => false, 'message' => 'Not authorized']);
    exit();
}

if (!isset($_FILES['image'])) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['success' => false, 'message' => 'No image uploaded']);
    exit();
}

$uploadDir = 'uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
$fileType = $_FILES['image']['type'];

if (!in_array($fileType, $allowedTypes)) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['success' => false, 'message' => 'Invalid file type']);
    exit();
}

$fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$fileName = uniqid() . '.' . $fileExt;
$targetPath = $uploadDir . $fileName;

if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
    echo json_encode([
        'success' => true,
        'url' => $targetPath
    ]);
} else {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['success' => false, 'message' => 'Error uploading file']);
}
