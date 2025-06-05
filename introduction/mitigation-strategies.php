<?php
require_once '../functions.php'; // Assuming functions.php is in the parent directory
?>
<html class="scroll-smooth" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
    Cybersecurity Mitigation Strategies | How to Protect Yourself Online
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
      <h1 class="text-4xl font-bold mb-6">Effective Cybersecurity Mitigation Strategies: How to Protect Yourself Online</h1>

      <div class="flex justify-center mb-8">
         <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?q=80&w=1470&auto=format&fit=crop" alt="Padlock on laptop keyboard representing protection strategies" class="rounded-lg shadow-lg w-full max-w-2xl">
      </div>

      <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Introduction: Taking Control of Your Digital Safety</h2>
        <p class="mb-4">While cyber threats are a constant presence in our digital lives (as outlined in our guide to <a href="common-threats.php" class="text-blue-600 dark:text-blue-400 hover:underline">Common Cyber Threats</a>), you are not powerless against them. By implementing proactive security measures and adopting safe online habits, you can significantly reduce your risk of becoming a victim.</p>
        <p>This guide focuses on practical, actionable steps – mitigation strategies – that everyone can take to enhance their personal cybersecurity posture and protect their valuable data and identity online.</p>
      </section>

      <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">How to Protect Yourself: Mitigation Strategies</h2>
        <p class="mb-4">Implementing the following practices can significantly bolster your defenses against common cyberattacks:</p>
        <ul class="list-none pl-0">
          <li class="mb-4 flex items-start">
            <i class="fas fa-key text-blue-500 mr-3 pt-1 w-5 text-center"></i>
            <div><strong>Use Strong, Unique Passwords & Password Managers:</strong> Avoid easily guessable passwords (names, birthdays, common words). Use a mix of cases, numbers, and symbols. Most importantly, use a *different*, strong password for *every* online account. Use a reputable password manager to generate, store, and fill these complex passwords securely.</div>
          </li>
          <li class="mb-4 flex items-start">
            <i class="fas fa-user-shield text-blue-500 mr-3 pt-1 w-5 text-center"></i>
            <div><strong>Enable Multi-Factor Authentication (MFA/2FA):</strong> Activate MFA wherever available (banks, email, social media). This requires a second form of verification (like a code from an authenticator app or SMS) in addition to your password, making it much harder for attackers to access your accounts even if they steal your password. Prefer authenticator apps or hardware keys over SMS if possible.</div>
          </li>
          <li class="mb-4 flex items-start">
            <i class="fas fa-envelope-open-text text-blue-500 mr-3 pt-1 w-5 text-center"></i>
            <div><strong>Be Skeptical of Unsolicited Communications (Phishing Awareness):</strong> Treat unexpected emails, calls, or messages with caution. Verify the sender's identity before clicking links or opening attachments. Hover over links to see the true destination URL. Look for red flags like urgency, threats, poor grammar, or generic greetings. If unsure, contact the organization directly via their official website or phone number, not through the suspicious message. Never provide passwords or OTPs via email or links.</div>
          </li>
          <li class="mb-4 flex items-start">
            <i class="fas fa-sync-alt text-blue-500 mr-3 pt-1 w-5 text-center"></i>
            <div><strong>Keep Software Updated:</strong> Regularly install updates for your operating system (Windows, macOS, iOS, Android), web browsers, antivirus software, and other applications as soon as they become available. Updates often contain critical security patches that fix vulnerabilities exploited by attackers.</div>
          </li>
           <li class="mb-4 flex items-start">
            <i class="fas fa-wifi text-blue-500 mr-3 pt-1 w-5 text-center"></i>
            <div><strong>Secure Your Wi-Fi & Use Public Wi-Fi Cautiously:</strong> Change the default admin password on your home router and use strong WPA2 or WPA3 encryption. Avoid sensitive activities (banking, shopping) on public Wi-Fi. If you must use public networks, use a Virtual Private Network (VPN) to encrypt your connection.</div>
          </li>
          <li class="mb-4 flex items-start">
            <i class="fas fa-save text-blue-500 mr-3 pt-1 w-5 text-center"></i>
            <div><strong>Back Up Your Data Regularly:</strong> Protect your important files from ransomware, hardware failure, or accidental deletion. Use the 3-2-1 backup rule (3 copies, 2 different media, 1 offsite). Options include external hard drives and secure cloud storage services.</div>
          </li>
           <li class="mb-4 flex items-start">
            <i class="fas fa-download text-blue-500 mr-3 pt-1 w-5 text-center"></i>
            <div><strong>Be Cautious with Downloads and Attachments:</strong> Only download software from official app stores or trusted vendor websites. Be extremely wary of unsolicited email attachments, especially executables (.exe) or archives (.zip). Scan downloads with antivirus software.</div>
          </li>
           <li class="mb-4 flex items-start">
            <i class="fas fa-cog text-blue-500 mr-3 pt-1 w-5 text-center"></i>
            <div><strong>Review Privacy Settings:</strong> Regularly review and adjust privacy settings on social media platforms, apps, and devices. Limit the amount of personal information shared publicly to reduce your attack surface.</div>
          </li>
        </ul>
      </section>

      <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Staying Vigilant: Security is an Ongoing Process</h2>
        <p>Cybersecurity isn't a set-it-and-forget-it task. Threats evolve, and so must your defenses. Stay informed about new scams and security best practices. Periodically review your passwords, security settings, and backup procedures. Cultivating a mindset of healthy skepticism and proactive security is your best long-term defense.</p>
      </section>

      <div class="bg-blue-50 dark:bg-gray-800 p-6 rounded-lg">
        <h3 class="text-xl font-semibold mb-3 flex items-center"><i class="fas fa-check-circle text-blue-600 dark:text-blue-400 mr-2"></i>Key Takeaways for Personal Security</h3>
        <ul class="list-disc pl-6">
          <li class="mb-2">Use <strong class="text-blue-600 dark:text-blue-400">strong, unique passwords</strong> (via a password manager).</li>
          <li class="mb-2">Enable <strong class="text-blue-600 dark:text-blue-400">Multi-Factor Authentication (MFA)</strong> everywhere possible.</li>
          <li class="mb-2">Be <strong class="text-blue-600 dark:text-blue-400">vigilant against phishing</strong> – verify before clicking/sharing.</li>
          <li class="mb-2">Keep all <strong class="text-blue-600 dark:text-blue-400">software updated</strong> regularly.</li>
          <li class="mb-2">Secure home Wi-Fi; use <strong class="text-blue-600 dark:text-blue-400">VPNs on public networks</strong>.</li>
          <li>Regularly <strong class="text-blue-600 dark:text-blue-400">back up important data</strong>.</li>
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