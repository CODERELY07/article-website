<?php
require_once 'functions.php';

if (isLoggedIn()) {
    header("Location: index.php");
    exit();
}

// Rate limiting function
function checkIpRateLimit($ipAddress, $conn): bool {
    $count = 0;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM registration_logs WHERE ip_address = ? AND DATE(created_at) = CURDATE()");
    $stmt->bind_param("s", $ipAddress);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count <= 3; // Return true if less than 3 registrations today
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $passwordConfirm = trim($_POST['password_confirm']);
    $ipAddress = $_SERVER['REMOTE_ADDR'];

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) {
        $error = "All fields are required";
    } elseif ($password !== $passwordConfirm) {
        $error = "Passwords do not match";
    } 
    
    // In the validation section (around line 25), replace the password length check with:
 elseif (strlen($password) < 8) {
    $error = "Password must be at least 8 characters";
} elseif (!preg_match('/[A-Z]/', $password)) {
    $error = "Password must contain at least one uppercase letter";
} elseif (!preg_match('/[a-z]/', $password)) {
    $error = "Password must contain at least one lowercase letter";
} elseif (!preg_match('/[0-9]/', $password)) {
    $error = "Password must contain at least one number";
} elseif (!preg_match('/[\W]/', $password)) {
    $error = "Password must contain at least one special character";
}

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } elseif (!checkIpRateLimit($ipAddress, $conn)) {
        $error = "You have reached the maximum number of registrations allowed per day (3)";
    } else {
        // Check if username or email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username or email already exists";
        } else {
            // Handle profile picture upload
            $profilePicture = 'default.png';
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Validate image file
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                $fileType = $_FILES['profile_picture']['type'];
                
                if (in_array($fileType, $allowedTypes)) {
                    $fileExt = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
                    $fileName = uniqid() . '.' . $fileExt;
                    $targetPath = $uploadDir . $fileName;

                    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetPath)) {
                        $profilePicture = $targetPath;
                    }
                }
            }

            // Insert new user with verification
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $verificationCode = rand(100000, 999999); // Generate a 6-digit verification code

            $stmt = $conn->prepare("INSERT INTO users (username, email, password, profile_picture, verification_code) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $username, $email, $hashedPassword, $profilePicture, $verificationCode);

            if ($stmt->execute()) {
                // Log the IP address in registration_logs
                $logStmt = $conn->prepare("INSERT INTO registration_logs (ip_address) VALUES (?)");
                $logStmt->bind_param("s", $ipAddress);
                $logStmt->execute();
                $logStmt->close();

                $_SESSION['email'] = $email;
                $_SESSION['verification_code'] = $verificationCode;
                header("Location: verify.php");
                exit();
            } else {
                $error = "Error creating account. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Your App Name</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="h-full bg-white dark:from-gray-800 dark:to-gray-900">
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center">
                <h2 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                    Create your account
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    Join our community today
                </p>
            </div>

            <!-- Error Message -->
            <?php if ($error): ?>
                <div class="rounded-md bg-red-50 dark:bg-red-900 dark:bg-opacity-20 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle h-5 w-5 text-red-400 dark:text-red-300"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 dark:text-red-200">
                                <?= htmlspecialchars($error) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" method="POST" enctype="multipart/form-data">
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Username
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400 dark:text-gray-500"></i>
                            </div>
                            <input id="username" name="username" type="text" required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="your.username">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400 dark:text-gray-500"></i>
                            </div>
                            <input id="email" name="email" type="email" required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="your.email@example.com">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 dark:text-gray-500"></i>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirm" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Confirm Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 dark:text-gray-500"></i>
                            </div>
                            <input id="password_confirm" name="password_confirm" type="password" required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div>
                        <label for="profile_picture" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Profile Picture (optional)
                        </label>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*"
                            class="block w-full text-sm text-gray-500 dark:text-gray-400
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 dark:file:bg-gray-700 file:text-blue-700 dark:file:text-gray-300
                                hover:file:bg-blue-100 dark:hover:file:bg-gray-600">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 shadow">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-user-plus text-blue-300 group-hover:text-blue-200 transition-colors duration-200"></i>
                        </span>
                        Create Account
                    </button>
                </div>
            </form>

            <div class="text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Already have an account?
                    <a href="login.php" class="font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">
                        Sign in
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>