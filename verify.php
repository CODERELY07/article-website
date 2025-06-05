<?php
require 'db.php';

$message = '';

if (!isset($_SESSION['email']) || !isset($_SESSION['verification_code'])) {
    header('Location: signup.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_code = trim($_POST['verification_code']);
    $email = $_SESSION['email'];
    $correct_code = $_SESSION['verification_code'];

    if (!empty($user_code)) {
        if ($user_code == $correct_code) {
            // Update user as verified
            $stmt = $conn->prepare("UPDATE users SET is_verified = 1 WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            // Clear session variables
            unset($_SESSION['email'], $_SESSION['verification_code']);
            
            // Set success message in session to display on login page
            $_SESSION['verification_success'] = "Email verified successfully! You can now login.";
            header('Location: login.php');
            exit();
        } else {
            $message = "Invalid verification code.";
        }
    } else {
        $message = "Please enter the verification code.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .message {
            color: red;
            margin-bottom: 1rem;
        }
        .verification-code {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 1rem 0;
            padding: 0.5rem;
            background-color: #f0f0f0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Verify Email</h2>
        <p>Your verification code is:</p>
        <div class="verification-code"><?= htmlspecialchars($_SESSION['verification_code'], ENT_QUOTES, 'UTF-8'); ?></div>
        
        <?php if (!empty($message)): ?>
            <p class="message"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="verification_code" class="form-control" placeholder="Enter verification code" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Verify</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>