<!--navbar !-->
  <nav class="bg-white dark:bg-gray-800 dark:border-gray-700 shadow-2xl fixed w-full top-0 z-100 px-4" id="navbar">
      <div class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between">
        <!-- Logo -->
        <div class="p-2 mt-2 mb-2 md:mt-0 md:mb-0 ms-2">
          <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <!-- Light logo -->
            <img src="./assets/logo.png" alt="Sibol logo" width="60" height="50" class="block dark:hidden">
            <!-- Dark logo -->
            <img src="../assets/logo-dark.png" alt="Sibol logo dark" width="60" height="50" class="hidden dark:block">
          </a>
        </div>
        <!-- Mobile Menu Button -->
        <button data-collapse-toggle="mega-menu-icons" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700"
          aria-controls="mega-menu-icons" aria-expanded="false">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 17 14" xmlns="http://www.w3.org/2000/svg">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
        <!-- Menu Items in absolute -->
        <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
          <div class="flex flex-col md:flex-row w-full">
            <div class="relative">
              <button id="mega-menu-icons-dropdown-button" data-dropdown-toggle="mega-menu-icons-dropdown"
                class="absolute top-5 left-0 flex w-full items-center justify-between px-4 py-3 md:py-2 font-medium text-gray-900 bg-gray-100 md:bg-transparent md:w-auto md:static border-b border-gray-100 md:border-0 hover:bg-gray-200 md:hover:bg-transparent hover:text-blue-400 dark:text-white dark:bg-gray-800 md:dark:bg-transparent dark:hover:bg-gray-700 md:dark:hover:bg-transparent transition-all duration-300 dark:border-gray-700">Mga Akdang Pampanitikan
                <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
                </svg>
              </button>
            </div>
            <div id="mega-menu-icons-dropdown" class="absolute z-10 hidden w-auto grid grid-cols-2 gap-x-4 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 dark:bg-gray-800 p-1">
              <div class="p-2 pb-0 text-gray-900 md:pb-2 dark:text-white">
                <ul class="space-y-2" aria-labelledby="mega-menu-icons-dropdown-button">
                  <li class="px-2 py-1">
                    <a href="panitikan.php?type=MAIKLING KUWENTO" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">MAIKLING KUWENTO </a>
                  </li>
 

                  <li class="px-2 py-1">
                    <a href="panitikan.php?type=DULA" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">DULA</a>
                  </li>
                  <li class="px-2 py-1">
                    <a href="panitikan.php?type=TULA" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">TULA</a>
                  </li>
             
                </ul>
              </div>
              <div class="p-2 text-gray-900 md:pb-2 dark:text-white">
                <ul class="space-y-2" aria-labelledby="mega-menu-icons-dropdown-button">
                  <li class="px-2 py-1">
                    <a href="panitikan.php?type=IBA PA" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">IBA PA </a>
                  </li>
                  <li class="px-2 py-1">
                    <a href="./sibol.php" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">SIBOL</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>