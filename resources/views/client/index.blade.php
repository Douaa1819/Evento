<x-head></x-head>

<body class="font-sans antialiased bg-gray-100">
    <!-- HEADER -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
          <a href="#" class="flex items-center text-gray-800 hover:text-gray-600">
            <img src="path/to/logo.png" alt="Logo" class="h-8 w-8 mr-2">
            <span class="font-bold text-xl">Evento</span>
          </a>
          <div class="flex items-center border rounded overflow-hidden">
            <input type="search" name="search" placeholder="Rechercher..." class="px-4 py-2 w-80" />
            <button class="flex items-center justify-center px-4 border-l">
              <svg class="h-4 w-4 text-gray-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </button>
          </div>
          <nav class="flex items-center">
          </nav>
        </div>
      </header>
      
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation" class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-2">
            <ul class="flex justify-center">
                <li class="mx-4"><a href="#" class="hover:text-gray-400">Home</a></li>
                <li class="mx-4"><a href="#" class="hover:text-gray-400">Hot Deals</a></li>
                <li class="mx-4"><a href="#" class="hover:text-gray-400">Categories</a></li>
                <li class="mx-4"><a href="#" class="hover:text-gray-400">Laptops</a></li>
                <li class="mx-4"><a href="#" class="hover:text-gray-400">Smartphones</a></li>
                <li class="mx-4"><a href="#" class="hover:text-gray-400">Cameras</a></li>
                <li class="mx-4"><a href="#" class="hover:text-gray-400">Accessories</a></li>
            </ul>
        </div>
    </nav>
    <!-- /NAVIGATION -->



    <!-- SECTION -->
<div class="section mt-8">
    <div class="container mx-auto px-4">
        <!-- row -->
        <div class="flex flex-wrap -mx-2">
            <!-- Evenment -->
            <div class="w-full sm:w-1/2 md:w-1/4 px-2 mb-4">
                <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                    <div class="bg-cover" style="background-image: url('./img/Evenment01.png'); height: 200px;"></div>
                    <div class="p-4">
                        <h2 class="font-bold text-lg mb-2">Evenment Name</h2>
                        <p class="text-gray-700 text-base mb-4">Evenment description .</p>
                        <button class="bg-red-500 hover:bg-black text-white font-bold py-2 px-4 rounded">
                            Reserver
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /SECTION -->

<!-- FOOTER -->
<footer class="bg-gray-800 text-white">
    <div class="container mx-auto px-6 py-4">
      <div class="flex flex-wrap justify-between">
        <div class="w-full md:w-1/4 mb-6">
          <h5 class="uppercase font-bold mb-2.5">Liens utiles</h5>
          <ul class="list-none mb-0">
            <li><a class="text-white hover:text-gray-400" href="#">Politique de confidentialité</a></li>
            <li><a class="text-white hover:text-gray-400" href="#">Termes & Conditions</a></li>
            <li><a class="text-white hover:text-gray-400" href="#">Contact</a></li>
          </ul>
        </div>
        <div class="w-full md:w-1/4 mb-6">
          <h5 class="uppercase font-bold mb-2.5">Company</h5>
          <p>Notre mission est de fournir des produits de qualité.</p>
        </div>
        <div class="w-full md:w-1/4 mb-6">
          <h5 class="uppercase font-bold mb-2.5">Contactez-nous</h5>
          <p>info@monsite.com</p>
          <p>+1 234 567 89</p>
        </div>
      </div>
      <div class="text-center pt-5 border-t border-gray-700">
        <p class="text-sm text-gray-400">© 2024 MonSite. Tous droits réservés.</p>
      </div>
    </div>
  </footer>
  
<!-- /FOOTER -->


    <!-- jQuery Plugins -->
</body>

</html>
