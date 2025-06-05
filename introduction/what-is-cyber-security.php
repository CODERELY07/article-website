<?php
require_once '../functions.php';
?>
<html class="scroll-smooth" lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   What is Cybersecurity? | History and Timeline
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
 
 </head>
 <body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100  transition-colors duration-500">
  
  
  <!--navbar !-->
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
          <a href="../index.php" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
         <?php 
            if (isLoggedIn()) {
                echo '<a href="../my_posts.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">My Posts</a>';
            }
            else{
                echo '<a href="../signup.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Activity Register</a>';
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
  
  <!-- Blog Post Content -->
  <main class="pt-24 pb-12 px-4 max-w-4xl mx-auto">
    <article class="prose dark:prose-invert max-w-none">
      <h1 class="text-4xl font-bold mb-6">What is Cybersecurity? A Comprehensive Guide with Historical Timeline</h1>
      
      <div class="flex justify-center mb-8">
        <img src="https://t4.ftcdn.net/jpg/02/45/63/69/360_F_245636933_kY23ohGptK5t6n8wGSXIgLgVXWeHJRct.jpg" alt="Cybersecurity concept" class="rounded-lg shadow-lg w-full max-w-2xl">
      </div>
      
      <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Understanding Cybersecurity</h2>
        <p class="mb-4">Cybersecurity is the practice of protecting systems, networks, and programs from digital attacks. These cyberattacks are usually aimed at accessing, changing, or destroying sensitive information; extorting money from users; or interrupting normal business processes.</p>
        <p class="mb-4">Cybersecurity is the practice of protecting internet-connected systems such as hardware, software and data from cyberthreats. It's used by individuals and enterprises to protect against unauthorized access to data centers and other computerized systems.

An effective cybersecurity strategy can provide a strong security posture against malicious attacks designed to access, alter, delete, destroy or extort an organization's or user's systems and sensitive data. Cybersecurity is also instrumental in preventing attacks designed to disable or disrupt a system's or device's operations.

An ideal cybersecurity approach should have multiple layers of protection across any potential access point or attack surface. This includes a protective layer for data, software, hardware and connected networks. In addition, all employees within an organization who have access to any of these endpoints should be trained on the proper compliance and security processes. Organizations also use tools such as unified threat management systems as another layer of protection against threats. These tools can detect, isolate and remediate potential threats and notify users if additional action is needed.</p>
        <div class="bg-blue-50 dark:bg-gray-800 p-4 rounded-lg mb-6">
          <h3 class="text-xl font-semibold mb-2">Key Elements of Cybersecurity:</h3>
          <ul class="list-disc pl-6">
            <li class="mb-2"><strong>Information security:</strong> Protects the integrity and privacy of data</li>
            <li class="mb-2"><strong>Network security:</strong> Secures computer networks from intruders</li>
            <li class="mb-2"><strong>Application security:</strong> Focuses on keeping software and devices free of threats</li>
            <li class="mb-2"><strong>Operational security:</strong> Includes processes for handling and protecting data assets</li>
            <li class="mb-2"><strong>Disaster recovery:</strong> Plans for responding to security breaches</li>
            <li><strong>End-user education:</strong> Teaching users about security best practices</li>
          </ul>
        </div>
        
        <p>According to <a href="https://www.techtarget.com/searchsecurity/definition/cybersecurity" class="text-blue-600 dark:text-blue-400 hover:underline">TechTarget</a>, implementing effective cybersecurity measures is particularly challenging today because there are more devices than people, and attackers are becoming more innovative.</p>
      </section>
      
      <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">The Evolution of Cybersecurity: A Timeline</h2>
        
        <div class="relative">
          <!-- Timeline -->
          <div class="border-l-4 border-blue-500 absolute h-full left-4 top-0"></div>
          
          <!-- Timeline Items -->
          <div class="mb-8 ml-12 relative">
            <div class="absolute w-8 h-8 bg-blue-500 rounded-full -left-12 flex items-center justify-center">
              <span class="text-white font-bold">1</span>
            </div>
            <h3 class="text-xl font-semibold mb-2">1970s: The Beginning</h3>
            <div class="flex flex-col md:flex-row gap-4 mb-4">
              <div class="flex-1">
                <p>The concept of cybersecurity emerged with the creation of ARPANET, the precursor to the internet. The first computer virus, called "Creeper," was detected on ARPANET in 1971.</p>
              </div>
              <div class="flex-1">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfEAujYaQ_apjULz6YLldP3lOnqEJVlcl6Vg&s" alt="ARPANET" class="rounded-lg shadow">
              </div>
            </div>
          </div>
          
          <div class="mb-8 ml-12 relative">
            <div class="absolute w-8 h-8 bg-blue-500 rounded-full -left-12 flex items-center justify-center">
              <span class="text-white font-bold">2</span>
            </div>
            <h3 class="text-xl font-semibold mb-2">1980s: Viruses and Malware</h3>
            <div class="flex flex-col md:flex-row gap-4 mb-4">
              <div class="flex-1">
                <p>The first antivirus software was developed. The Morris Worm in 1988 infected about 10% of internet-connected computers, highlighting the need for better security.</p>
              </div>
              <div class="flex-1">
                <img src="https://cdn.sanity.io/images/dsh0fq3f/production/eb5d783ad2901536d5759495befde26cce7a09cb-974x720.png?w=675&h=499&fit=crop" alt="Morris Worm" class="rounded-lg shadow">
              </div>
            </div>
          </div>
          
          <div class="mb-8 ml-12 relative">
            <div class="absolute w-8 h-8 bg-blue-500 rounded-full -left-12 flex items-center justify-center">
              <span class="text-white font-bold">3</span>
            </div>
            <h3 class="text-xl font-semibold mb-2">1990s: The Internet Goes Public</h3>
            <div class="flex flex-col md:flex-row gap-4 mb-4">
              <div class="flex-1">
                <p>With the commercialization of the internet, cyber threats multiplied. Firewalls and encryption became standard security measures. The first distributed denial-of-service (DDoS) attacks appeared.</p>
              </div>
              <div class="flex-1">
                <img src="https://media.npr.org/assets/img/2023/04/27/gettyimages-167798468_wide-6432196e35c6c7c75835e283c78861b0bc772f51.jpg?s=1400&c=100&f=jpeg" alt="1990s internet" class="rounded-lg shadow">
              </div>
            </div>
          </div>
          
          <div class="mb-8 ml-12 relative">
            <div class="absolute w-8 h-8 bg-blue-500 rounded-full -left-12 flex items-center justify-center">
              <span class="text-white font-bold">4</span>
            </div>
            <h3 class="text-xl font-semibold mb-2">2000s: Cybercrime Becomes Organized</h3>
            <div class="flex flex-col md:flex-row gap-4 mb-4">
              <div class="flex-1">
                <p>Cyberattacks became more sophisticated with the rise of organized cybercrime. Major breaches affected companies like Sony, TJX, and Heartland Payment Systems. Governments began establishing cybersecurity agencies.</p>
              </div>
              <div class="flex-1">
                <img src="https://content.kaspersky-labs.com/fm/press-releases/3d/3d3e4c313de2309e864e8618554296a0/processed/2056037282-q75.jpg" alt="Cybercrime" class="rounded-lg shadow">
              </div>
            </div>
          </div>
          
          <div class="mb-8 ml-12 relative">
            <div class="absolute w-8 h-8 bg-blue-500 rounded-full -left-12 flex items-center justify-center">
              <span class="text-white font-bold">5</span>
            </div>
            <h3 class="text-xl font-semibold mb-2">2010s: State-Sponsored Attacks</h3>
            <div class="flex flex-col md:flex-row gap-4 mb-4">
              <div class="flex-1">
                <p>Nation-state cyber warfare emerged with attacks like Stuxnet. Ransomware became a major threat. The General Data Protection Regulation (GDPR) was implemented in the EU, changing data protection globally.</p>
              </div>
              <div class="flex-1">
                <img src="https://www.fortra.com/sites/default/files/pt-blog-malware-virus-anti-malware-antivirus-differences-banner-01.png" alt="Stuxnet" class="rounded-lg shadow">
              </div>
            </div>
          </div>
          
          <div class="mb-8 ml-12 relative">
            <div class="absolute w-8 h-8 bg-blue-500 rounded-full -left-12 flex items-center justify-center">
              <span class="text-white font-bold">6</span>
            </div>
            <h3 class="text-xl font-semibold mb-2">2020s: AI and IoT Security Challenges</h3>
            <div class="flex flex-col md:flex-row gap-4 mb-4">
              <div class="flex-1">
                <p>The proliferation of IoT devices and AI-powered attacks present new challenges. Supply chain attacks like SolarWinds highlight vulnerabilities. Zero-trust security models gain popularity.</p>
              </div>
              <div class="flex-1">
                <img src="https://theos-cyber.com/wp-content/uploads/2023/10/iotsecurity-1.jpg" alt="IoT security" class="rounded-lg shadow">
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Why Cybersecurity Matters Today</h2>
        <div class="grid md:grid-cols-2 gap-6 mb-6">
          <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
            <h3 class="text-lg font-semibold mb-2 flex items-center">
              <i class="fas fa-shield-alt text-blue-500 mr-2"></i> Data Protection
            </h3>
            <p>With increasing amounts of sensitive data stored online, cybersecurity is essential to protect personal and financial information from theft.</p>
          </div>
          <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
            <h3 class="text-lg font-semibold mb-2 flex items-center">
              <i class="fas fa-building text-blue-500 mr-2"></i> Business Continuity
            </h3>
            <p>Cyberattacks can cripple businesses. Strong security measures ensure operations continue uninterrupted.</p>
          </div>
          <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
            <h3 class="text-lg font-semibold mb-2 flex items-center">
              <i class="fas fa-globe-americas text-blue-500 mr-2"></i> National Security
            </h3>
            <p>Governments and critical infrastructure are prime targets for cyber warfare and espionage.</p>
          </div>
          <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
            <h3 class="text-lg font-semibold mb-2 flex items-center">
              <i class="fas fa-user-shield text-blue-500 mr-2"></i> Personal Safety
            </h3>
            <p>From smart homes to medical devices, cybersecurity directly impacts our physical safety in an interconnected world.</p>
          </div>
        </div>
        
      </section>
      
      <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Future of Cybersecurity</h2>
        <p class="mb-4">As technology evolves, so do cyber threats. Emerging trends include:</p>
        <ul class="list-disc pl-6 mb-6">
          <li class="mb-2">Artificial Intelligence in both attack and defense strategies</li>
          <li class="mb-2">Quantum computing's potential to break current encryption</li>
          <li class="mb-2">Increased focus on cloud security</li>
          <li>Growing importance of cybersecurity in space systems</li>
        </ul>
        <p>The cybersecurity landscape will continue to change, requiring constant vigilance and adaptation from individuals, businesses, and governments alike.</p>
      </section>
      
      <div class="bg-blue-50 dark:bg-gray-800 p-6 rounded-lg">
        <h3 class="text-xl font-semibold mb-3">Cybersecurity Statistics</h3>
        <div class="grid md:grid-cols-3 gap-4">
          <div class="text-center">
            <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">$6 trillion</div>
            <div class="text-sm">Estimated global cost of cybercrime by 2025</div>
          </div>
          <div class="text-center">
            <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">300%</div>
            <div class="text-sm">Increase in reported cybercrimes since COVID-19</div>
          </div>
          <div class="text-center">
            <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">3.5 million</div>
            <div class="text-sm">Unfilled cybersecurity jobs worldwide</div>
          </div>
        </div>
      </div>
    </article>
  </main>
  
  <?php include("../components/footer.php") ?>
  
 <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
 </body>
</html>