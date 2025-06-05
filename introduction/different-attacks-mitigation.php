<?php
require_once '../functions.php'; // Assuming functions.php is in the parent directory
?>
<html class="scroll-smooth" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
    Understanding Common Cyber Threats | Online Dangers Explained
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <script>
    // Optional: Add dark mode toggle logic if needed
  </script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-500">

  <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="../index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white ">Cybersec</span>
      </a>
      <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="../index.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
          </li>
          <li>
           <?php
             // Check if the function exists before calling it
             if (function_exists('isLoggedIn')) {
                 if (isLoggedIn()) {
                     echo '<a href="../my_posts.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">My Posts</a>';
                 } else {
                     echo '<a href="../signup.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Activity Register</a>';
                 }
             } else {
                 // Fallback or error message if function doesn't exist
                 echo '<a href="../signup.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Activity Register (login status unknown)</a>';
             }
           ?>
          </li>
          <li>
            <a href="../login.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="pt-24 pb-12 px-4 max-w-4xl mx-auto">
    <article class="prose dark:prose-invert max-w-none">
      <h1 class="text-4xl font-bold mb-6">Understanding Common Cyber Threats: A Guide to Online Dangers</h1>

      <div class="flex justify-center mb-8">
        <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?q=80&w=1470&auto=format&fit=crop" alt="Padlock on laptop keyboard representing security threats" class="rounded-lg shadow-lg w-full max-w-2xl">
      </div>

      <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Introduction: The Ever-Present Online Risks</h2>
        <p class="mb-4">As we rely more on digital technology for daily tasks, the risk of encountering cyber threats grows. These threats come in many forms, employed by attackers aiming to steal information, extort money, disrupt services, or cause damage. Understanding what these dangers look like is the first crucial step towards recognizing and avoiding them.</p>
        <p>This guide focuses on outlining some of the most common types of cyber threats that individuals and businesses face today, particularly prevalent here in the Philippines and globally.</p>
      </section>

      <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Common Cyber Threats You Might Encounter</h2>
        <p class="mb-4">Attackers use various methods to compromise your security. Awareness is key to spotting them. Here are some of the most frequent threats:</p>

        <div class="mb-6 p-4 border-l-4 border-red-500 bg-red-50 dark:bg-gray-800 rounded-r-lg">
          <h3 class="text-xl font-semibold mb-2 flex items-center"><i class="fas fa-fish text-red-500 mr-2"></i>Phishing</h3>
          <p>Phishing attacks use deceptive emails, messages (SMS/smishing), or websites designed to look legitimate. The goal is to trick you into revealing sensitive information (like passwords, OTPs, or credit card numbers) or clicking malicious links/attachments that install malware.</p>
        </div>

        <div class="mb-6 p-4 border-l-4 border-yellow-500 bg-yellow-50 dark:bg-gray-800 rounded-r-lg">
          <h3 class="text-xl font-semibold mb-2 flex items-center"><i class="fas fa-virus text-yellow-500 mr-2"></i>Malware</h3>
          <p>Short for malicious software, malware is a broad category including viruses, worms, trojans, spyware, adware, and ransomware. Once installed on your device (often via malicious downloads, links, or attachments), malware can steal data, damage files, spy on your activity, lock your system (ransomware), or disrupt operations.</p>
        </div>

         <div class="mb-6 p-4 border-l-4 border-purple-500 bg-purple-50 dark:bg-gray-800 rounded-r-lg">
          <h3 class="text-xl font-semibold mb-2 flex items-center"><i class="fas fa-key text-purple-500 mr-2"></i>Password Attacks</h3>
          <p>Attackers attempt to gain unauthorized access to your accounts by guessing passwords (brute force), using common password lists (dictionary attacks), or using credentials stolen from previous data breaches on other websites (credential stuffing). Weak, reused, or easily guessable passwords significantly increase your vulnerability.</p>
        </div>

        <div class="mb-6 p-4 border-l-4 border-green-500 bg-green-50 dark:bg-gray-800 rounded-r-lg">
          <h3 class="text-xl font-semibold mb-2 flex items-center"><i class="fas fa-user-secret text-green-500 mr-2"></i>Man-in-the-Middle (MitM) Attacks</h3>
          <p>On unsecured networks, especially public Wi-Fi, attackers can intercept the communication between your device and the internet (e.g., the Wi-Fi router). This allows them to eavesdrop on your activity, steal login credentials or financial data entered on unencrypted (HTTP) sites, or even inject malicious content.</p>
        </div>

        <div class="mb-6 p-4 border-l-4 border-blue-500 bg-blue-50 dark:bg-gray-800 rounded-r-lg">
            <h3 class="text-xl font-semibold mb-2 flex items-center"><i class="fas fa-theater-masks text-blue-500 mr-2"></i>Social Engineering</h3>
            <p>This is an overarching tactic relying on psychological manipulation rather than technical exploits. Attackers trick people into divulging confidential information, granting access, or performing actions that compromise security. Phishing is a prime example, but it also includes impersonation (vishing - voice calls), baiting, and pretexting.</p>
        </div>

      </section>

      <section class="mb-12">
         <h2 class="text-2xl font-semibold mb-4">What's Next?</h2>
         <p>Understanding these threats is vital. The next step is learning how to actively defend against them. Read our companion guide on <a href="mitigation-strategies.php" class="text-blue-600 dark:text-blue-400 hover:underline">Effective Cybersecurity Mitigation Strategies</a> to discover practical steps you can take to protect yourself online.</p>
      </section>

       <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg mt-8">
        <h3 class="text-xl font-semibold mb-3 flex items-center"><i class="fas fa-exclamation-triangle text-yellow-500 mr-2"></i>Key Threats Summarized</h3>
        <ul class="list-disc pl-6">
          <li class="mb-2"><strong>Phishing & Smishing:</strong> Deceptive messages aiming to steal credentials or install malware.</li>
          <li class="mb-2"><strong>Malware:</strong> Malicious software including viruses, ransomware, spyware.</li>
          <li class="mb-2"><strong>Password Attacks:</strong> Attempts to guess or reuse stolen passwords.</li>
          <li class="mb-2"><strong>Man-in-the-Middle:</strong> Eavesdropping on unsecured networks (like public Wi-Fi).</li>
          <li><strong>Social Engineering:</strong> Manipulating people to bypass security.</li>
        </ul>
      </div>


    </article>
  </main>

 <?php
   // Check if the footer component exists before including it
   if (file_exists("../components/footer.php")) {
       include("../components/footer.php");
   } else {
       echo '<footer class="bg-gray-200 dark:bg-gray-800 p-4 text-center text-sm text-gray-600 dark:text-gray-400 mt-12">Footer component not found.</footer>';
   }
 ?>

 <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>