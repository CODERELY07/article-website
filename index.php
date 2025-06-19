<?php
// require_once 'functions.php';
// $posts = getAllPosts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIBOL</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-white dark:bg-gray-900">
    <?php include('./components/navbar.php');?>
    <div id="preloader">
    <div class="loader">
      <img src="./assets/logo.png" alt="Sibol logo" class="mx-auto block" width="120">
      <img src="./assets/load.gif" alt="Loading..." class="mx-auto block">
    </div>
  </div>
     <main class="bg-white dark:bg-gray-900">
      <!-- Section 0 -->
      <div id="default-carousel" class="relative w-full mb-20" data-carousel="slide">
        <div class="relative h-screen py-20 overflow-hidden md:h-screen">
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <section class="flex h-screen items-center justify-center bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
              <div class="flex flex-col items-center justify-center h-full text-center px-4 mx-auto max-w-screen-xl relative">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                  Mga Akdang Pampanitikan
                </h1>
                <p class="mb-8 text-md font-normal text-gray-500 lg:text-lg sm:px-16 lg:px-48 dark:text-gray-200">
                  Ang panitikan ay nagmula sa “pang-titik-an”. Ang kahulugan nito ay literatura o mga akdang nasusulat.
                </p>
              </div>
            </section>
          </div>
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <section class="flex h-screen items-center justify-center bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
              <div class="flex flex-col items-center justify-center h-full text-center px-4 mx-auto max-w-screen-xl relative">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                  Ang Alamat
                </h1>
                <p class="mb-8 text-md font-normal text-gray-500 lg:text-lg sm:px-16 lg:px-48 dark:text-gray-200">
                  Ang alamat ay isang uri ng panitikan na nagkukuwento tungkol sa mga pinagmulan ng mga bagay sa daigdig.
                </p>
              </div>
            </section>
          </div>
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <section class="flex h-screen items-center justify-center bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
              <div class="flex flex-col items-center justify-center h-full text-center px-4 mx-auto max-w-screen-xl relative">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                  Maikling Kwento
                </h1>
                <p class="mb-8 text-md font-normal text-gray-500 lg:text-lg sm:px-16 lg:px-48 dark:text-gray-200">
                  Ang maikling kuwento ay isang maikling salaysay hinggil sa isang mahalagang pangyayari.
                </p>
              </div>
            </section>
          </div>
        </div>
        <div class="wrapper absolute bottom-2 left-0 right-0 flex items-center justify-center z-50">
          <div class="scroll-icon">
            <span class="text-sm">Scroll</span>
            <div class="mouse-icon w-4 h-6">
              <div class="mouse-icon_wheel w-1 h-2 bg-gray-400 rounded-full animate-bounce"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Section 1 -->
      <section class="bg-white dark:bg-gray-900 md:px-10" id="more">
        <div class="py-8 px-4 text-white mx-auto max-w-screen-xl lg:py-1">
          <div data-aos="zoom-in-up" data-aos-duration=1000 class="hover:scale-101 hover:shadow-lg bg-blue-600 dark:bg-gray-800 border border-gray-200 cursor-pointer dark:border-gray-700 rounded-lg p-8 mb-8">
            <a href="#" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2 py-1 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-1">Akdang Pampanitikan</a>
            <h1 class="dark:text-white text-3xl md:text-3xl font-extrabold mb-4">Ano ang SIBOL?</h1>
            <p class="text-md font-normal dark:text-gray-400">
              Suri sa Inobatibong Batay sa Online Learning. Gamit ang Online Platform na ito maari mong masaba at matuto tungkol ibat ibat uri ng mga panitikan katulad ng mga Alamat,Maikling kwento at iba pa.
            </p>
          </div>
          <div class="grid md:grid-cols-2 md:gap-8">
            <div data-aos="flip-right" data-aos-duration=1000 class="hover:scale-101 hover:shadow-lg bg-purple-600 dark:bg-gray-800 border border-gray-200 cursor-pointer dark:border-gray-700 rounded-lg p-8 mb-8">
              <a href="#" class="bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-1">Tula</a>
              <h1 class="dark:text-white text-3xl md:text-3xl font-extrabold mb-4">Ano ang Tula?</h2>
              <p class="text-md font-normal dark:text-gray-400">
                Ang tula ay isang masining na pagpapahayag ng damdamin, kaisipan, o karanasan sa pamamagitan ng matalinghagang wika at sukat at tugma (bagama’t may mga tulang malaya na rin sa mga ito). Ginagamit sa tula ang tayutay at malikhaing anyo upang makalikha ng bisa sa damdamin ng mambabasa o tagapakinig.
              </p>
            </div>
            <div data-aos="flip-right" data-aos-duration=1000 class="hover:scale-101 hover:shadow-lg bg-purple-600 dark:bg-gray-800 border border-gray-200 cursor-pointer dark:border-gray-700 rounded-lg p-8 mb-8">
              <a href="#" class="bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-1">Dula</a>
              <h1 class="dark:text-white text-3xl md:text-3xl font-extrabold mb-4">Ano ang Dula?</h2>
              <p class="text-md font-normal dark:text-gray-400">
                Ang dula ay isang uri ng panitikan na itinatanghal sa entablado o sa harap ng madla. Layunin nitong libangin, magturo, o magbigay ng mensahe sa pamamagitan ng kilos at diyalogo ng mga tauhan. Nahahati ito sa ilang yugto o eksena, at karaniwan itong ginaganap sa anyong iskrip at may direksiyon.
              </p>
            </div>
            <div data-aos="flip-left" data-aos-duration=1000 class="hover:scale-101 hover:shadow-lg bg-orange-600 dark:bg-gray-800 border border-gray-200 cursor-pointer dark:border-gray-700 rounded-lg p-8 mb-8">
              <a href="#" class="bg-orange-100 text-orange-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-yellow-400 mb-1">Maikling Kwento</a>
              <h1 class="dark:text-white text-3xl md:text-3xl font-extrabold mb-4">Ano ang Maikling kwento?</h2>
              <p class="text-md font-normal dark:text-gray-400">
                Ang maikling kuwento - binaybay ding maikling kwento - ay isang
                maiksing salaysay hinggil sa isang mahalagang pangyayaring
                kinasasangkutan ng isa o ilang tauhan at may iisang kakintalan o
                impresyon lamang.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- Section 3 -->
      <div class="flex flex-col px-5 mt-20 pb-20 px-8 md:px-10 md:flex-row items-center justify-between space-y-8 md:space-y-0 md:space-x-8 mx-auto max-w-screen-xl">
        <!-- Carousel Section -->
        <div class="relative w-full md:w-1/2">
          <div id="indicators-carousel" class="relative w-full" data-carousel="slide">
            <div class="relative h-100 overflow-hidden rounded-lg md:h-80">
              <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="./assets/home_carousel/himig.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 sm:h-72=" alt="...">
              </div>
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="./assets/home_carousel/dalampasigan.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
              </div>
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="./assets/home_carousel/pag-ibig.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
              </div>
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="./assets/home_carousel/silahis.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
              </div>
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="./assets/home_carousel/sa piling mo.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
              </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
              <button type="button" class="w-2 h-2 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
              <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
              <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
              <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
              <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
              <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-3 h-3 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
              </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
              <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-3 h-3 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
              </span>
            </button>
          </div>
        </div>
        <!-- Text Section -->
        <div class="w-full md:w-1/2">
          <h2 class="dark:text-white text-2xl font-semibold mb-4">Mga Ilan sa mga Akdang Panitikan</h2>
          <p class="text-md text-gray-400">
              Ito ay mga halimbawa ng akdang panitikan na orihinal na gawa ng SIBOl. Ang mga akdang ito ay nilikha ng mga kasapi at mga talento ng SIBol, na naglalayong ipakita ang kagandahan at kahalagahan ng ating kultura at tradisyon. Sa bawat tula, kwento, at sanaysay na kanilang isinulat, ipinapakita ang malalim na pag-unawa sa ating kasaysayan at mga karanasan bilang isang bansa. Ang mga akdang ito ay nagsisilbing pagninilay at pagpapahayag ng ating mga saloobin at pananaw tungkol sa ating lipunan.
          </p>
        </div>
      </div>
    </main>
  
    <?php include("./components/footer.php") ?>
     <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        document.querySelectorAll('#preloader .loader p span').forEach((span, index) => {
        span.style.setProperty('--i', index); 
        });

        setTimeout(() => {
        document.getElementById('preloader').classList.add('hidden');
        
        setTimeout(() => {
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('preloader').classList.remove('hidden');
            document.getElementById('main-content').style.display = 'block'; 
        }, 1000); 
        }, 3000); 
    </script>
</body>
</html>

