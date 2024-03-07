<x-head></x-head>
<style> 
   .carousel-inner {
        display: flex;
        transition: transform 0.5s ease;
    }

    .carousel-slide {
        width: 100%;
        flex-shrink: 0;
        position: relative;
    }

    .carousel {
        position: relative;
        width: 100%;
        max-width: 1270px;
        margin: 0 auto;
        overflow: hidden;
        border-radius: 8px;
    }

    .carousel img {
        width: 100%;
        height: 72%; 
        object-fit: cover; 
    }

    .carousel-caption {
        position: absolute;
        bottom: 40%;
        left: 50%;
        transform: translateX(-50%);
        background-color: transparent;
        color: #0000
        padding: 1.5rem; 
        border-radius: 8px;
        max-width: 70%;
        text-align: center;
        box-shadow: transparent;
        font-family: 'Open Sans', sans-serif; 
    }

    .carousel-caption h2 {
        font-size: 2.5rem; 
        margin-bottom: 0.5rem;
    }

    .carousel-caption p {
        font-size: 1.5rem; 
    }
</style>
<body class="bg-gray-100 font-sans">

<!-- HEADER -->
<header class="bg-white shadow">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="#" class="flex items-center">
            <img src="/path/to/logo.png" alt="Evento Logo" class="h-8 mr-2">
            <span class="text-xl font-bold text-gray-800">Evento</span>
        </a>
        <div class="flex items-center space-x-2">
            <input type="search" placeholder="Rechercher..." class="px-4 py-2 w-80 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-red-500">
            <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-r-md">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <nav class="flex space-x-4">
            <a href="#" class="hover:text-gray-600">Accueil</a>
            <a href="#" class="hover:text-gray-600">Événements</a>
            <a href="#" class="hover:text-gray-600">Contact</a>
        </nav>
    </div>
</header>


<nav id="navigation" class="bg-black text-white">
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

    <div class="carousel" data-carousel="static">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-slide">
                <img src="https://source.unsplash.com/random/1280x720" alt="Slide 1">
                <div class="carousel-caption">
                    <h2 class="text-xl md:text-3xl font-semibold text-white">Découvrez des événements qui vous ressemblent</h2>
                    <p class="hidden md:block md:text-lg text-white mt-2">Rejoignez la communauté Evento et vivez des moments inoubliables.</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="https://source.unsplash.com/random/1280x720?event" alt="Slide 2">
            </div>

            <div class="carousel-slide">
                <img src="https://source.unsplash.com/random/1280x720?concert" alt="Slide 3">
             
            </div>
            <!--  plus de slides ici -->
        </div>
    </div>


<!-- Event CONTENT -->
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Card -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="https://source.unsplash.com/random/480x320?event" alt="Event" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-bold">Nom de l'événement</h3>
                <p class="text-gray-600 mt-2">Description brève de l'événement.</p>
                <div class="flex items-center mt-4">
                    <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                    <p>Lieu de l'événement</p>
                </div>
                <div class="flex items-center mt-2">
                    <i class="fas fa-calendar-alt text-red-500 mr-2"></i>
                    <p>Date de l'événement</p>
                </div>
                <div class="flex items-center mt-2">
                    <i class="fas fa-users text-red-500 mr-2"></i>
                    <p>Places disponibles</p>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-red-500 font-bold">Prix: XX€</span>
                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Réserver</button>
                </div>
            </div>
        </div>
        <!-- more event  -->
    </div>
</div>


<!-- FOOTER -->
<footer class="bg-gray-800 text-white mt-10">
    <div class="container mx-auto px-6 py-4">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/3 mb-6">
                <h5 class="uppercase font-bold mb-2.5">À propos</h5>
                <p>Evento est votre passerelle pour les expériences inoubliables. Réservez votre place dès maintenant et vivez l'événement de vos rêves.</p>
            </div>
            <div class="w-full md:w-1/3 mb-6">
                <h5 class="uppercase font-bold mb-2.5">Liens utiles</h5>
                <ul class="list-none mb-0">
                    <li><a class="hover:text-gray-400" href="#">Politique de confidentialité</a></li>
                    <li><a class="hover:text-gray-400" href="#">Termes & Conditions</a></li>
                    <li><a class="hover:text-gray-400" href="#">Contact</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/3 mb-6">
                <h5 class="uppercase font-bold mb-2.5">Contactez-nous</h5>
                <p>info@evento.com</p>
                <p>+1 234 567 89</p>
            </div>
        </div>
        <div class="text-center pt-5 border-t border-gray-700">
            <p class="text-sm text-gray-400">© 2024 Evento. Tous droits réservés.</p>
        </div>
    </div>
</footer>

</body>
</html>
