<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cybersec daliva</title>
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
   <div class="max-w-4xl my-20 mt-30 mx-auto p-6 bg-blue-50 rounded-lg shadow-md border border-blue-100">
    <h1 class="text-3xl font-bold text-blue-800 mb-4 text-center">Ang SIBOL</h1>
    
    <p class="text-gray-700 mb-4 leading-relaxed">
        Ang SIBOL ay isang daluyan ng pagpapaunlad, pagpapayaman, at patuloy na pagpapalago ng panitikang Filipino sa konteksto ng makabagong panahon. Sa pagyakap nito sa teknolohiya at mga digital na plataporma, layunin nitong isulong ang mas malawak na pag-unawa at pagpapahalaga sa mga akdang pampanitikan.
    </p>
    
    <p class="text-gray-700 mb-4 leading-relaxed">
        Sa pamamagitan ng inisyatibong ito, naipapamalas ang kakayahan ng panitikan na makasabay sa mabilis na pagbabago ng panahon, habang pinananatili ang diwang maka-Filipino sa larangan ng kultura at edukasyon.
    </p>
    
    <h2 class="text-xl font-semibold text-blue-700 mt-6 mb-3">Mga Tampok na Akda</h2>
    <p class="text-gray-700 mb-4 leading-relaxed">
        Tampok sa website na ito ang mga orihinal at piling akdang pampanitikan tulad ng maikling kuwento, dula, at tula na isinulat upang umangkop sa karanasan, antas ng pag-unawa, at interes ng mga kabataang Pilipino.
    </p>
    
    <h2 class="text-xl font-semibold text-blue-700 mt-6 mb-3">Mga Layunin</h2>
    <p class="text-gray-700 mb-4 leading-relaxed">
        Layunin ng SIBOL na maging kapaki-pakinabang na kasangkapan para sa mga guro at mag-aaral sa mas malalim na pag-unawa sa panitikan at sa pagpapalawak ng kasanayan sa pagbasa, pagsusuri, at paglikha ng mga akda. Sa ganitong paraan, muling sumisibol ang pagmamahal sa panitikan, para sa bagong henerasyon ng mga mambabasa at manunulat.
    </p>
    
    <div class="mt-6 pt-4 border-t border-blue-200 text-sm text-blue-600 text-center">
        Sumibol ang pagmamahal sa panitikang Filipino
    </div>
    </div>
    
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

