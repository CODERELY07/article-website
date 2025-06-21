<?php
require_once 'functions.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header("Location: ./my_posts.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIBOL</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
</head>

<body class="h-full bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-900">
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center">
                <!-- Logo or Brand -->
                <div class="mx-auto h-16 w-16 rounded-full bg-white dark:bg-gray-700 shadow-lg flex items-center justify-center mb-4">
                    <i class="fas fa-lock text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
                <h2 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                    Welcome back
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    Sign in to access your account
                </p>
            </div>

           
            <div id="errorContainer" class=" rounded-md bg-red-50 dark:bg-red-900 dark:bg-opacity-20 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle h-5 w-5 text-red-400 dark:text-red-300"></i>
                    </div>
                    <div class="ml-3">
                        <p id="errorMessage" class="text-sm text-red-700 dark:text-red-200">
                           
                        </p>
                    </div>
                </div>
            </div>

            <form class="mt-8 space-y-6" id="loginForm">
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400 dark:text-gray-500"></i>
                            </div>
                            <input id="email" name="email" type="email" 
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
                            <input id="password" name="password" type="password" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="••••••••">
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 shadow">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-sign-in-alt text-blue-300 group-hover:text-blue-200 transition-colors duration-200"></i>
                        </span>
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#errorContainer').hide();

            $('#loginForm').submit(function (e) {
                e.preventDefault();

                const email = $('#email').val().trim();
                const password = $('#password').val().trim();

                if (!email || !password) {
                     $('#errorContainer').show();
                    $('#errorMessage').text('Please enter both email and password.');
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: 'ajax_login.php',
                    data: { email: email, password: password },
                    dataType: 'json',
                    success: function (response) {
                      
                        if (response.success) {
                            $('#errorContainer').hide();
                            $('#errorMessage').text("");
                            window.location.href = "./my_posts.php";
                        } else{
                            $('#errorContainer').show();
                            $('#errorMessage').text(response.message);
                        }
                    },
                    error: function () {
                         $('#errorContainer').hide();
                        $('#errorMessage').text('An unexpected error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
</body>
</html>