<?php
session_start();

$message = '';

if (!isset($_SESSION['otp']) || !isset($_SESSION['email']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_otp = trim($_POST['otp']);

    if (!empty($user_otp)) {
        if ($user_otp == $_SESSION['otp']) {
            $_SESSION['otp_verified'] = true; // Set OTP verification flag
            header('Location: my_posts.php');
            exit();
        } else {
            $message = "Invalid OTP. Please try again.";
        }
    } else {
        $message = "Please enter the OTP.";
    }
}
?>

<!-- ... rest of the existing HTML content ... -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
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
        .otp-code {
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
        <h2>Verify OTP</h2>
        <p>Your OTP is:</p>
        <div class="otp-code"><?= htmlspecialchars($_SESSION['otp'], ENT_QUOTES, 'UTF-8'); ?></div>
        
        <?php if (!empty($message)): ?>
            <p class="message"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>