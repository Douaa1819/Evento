<x-head></x-head>



<body class="bg-gray-100 font-sans">

<!-- Header-->
<header class="bg-white border-b border-gray-100 shadow-xl">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="{{route('client.home')}}" class="flex items-center">
            <img src="{{asset('images/licon.png')}}" alt="Evento Logo" class="h-8 mr-2">
            <span class="text-xl font-bold text-gray-800">Evento</span>
        </a>
        <div class="flex items-center space-x-4">
            <form action="{{ route('search') }}" method="GET" class="flex items-center">
                <input type="search" name="search" placeholder="Entrer le titre d'événement" class="px-4 py-2 w-80 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-red-500">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-r-md">
                    <i class="fas fa-search"></i>
                </button>
            </form>

        </div>

        <nav class="flex space-x-4">
            <a href="#" class="hover:text-red-500">Accueil</a>
            <a href="#" class="hover:text-red-500">Événements</a>
            <a href="#" class="hover:text-red-500">Contact</a>
            <a href="{{ route('logout.perform') }}" class="hover:text-red-500">Logout</a>
        </nav>
    </div>
</header>

<nav id="navigation" class="bg-black text-white mt-0">
    <div class="container mx-auto px-4 py-2">
        <ul class="flex justify-center">
           @foreach ($categories as $categorie)
           <li class="mx-4"><a href="{{ route('filtrage', $categorie->id) }}" class="hover:text-red-500">
            {{ $categorie->nom }}
        </a></li>
           @endforeach
        </ul>
        
    </div>
</nav>
<div class="relative w-full overflow-hidden">
    <!-- Slide  -->
    <div class="flex">
        <img src="{{asset('images/slide.jpg')}}" alt="Slide1" class="w-full h-96 md:h-108 object-cover">
        <div class="absolute bottom-1/4 left-1/4 bg-transparent text-center" style="max-width: 70%; box-shadow: transparent;">
            <h2 class="text-xl md:text-3xl font-semibold text-white">Découvrez des événements qui vous ressemblent</h2>
            <p class="hidden md:block md:text-lg text-white mt-2">Rejoignez la communauté Evento et vivez des moments inoubliables.</p>
        </div>
    </div>
</div>






@if(session('success'))
<div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    <span class="font-medium">Success alert!</span> {{ session('success') }}
  </div>
</div>
@endif


@if (session('alert'))
<div class="ml-4 bg-pink-100 text-red-800  00 px-4 py-2 rounded-md text-sm" role="alert">
    {{ session('alert') }}
</div>
@endif




<div class="flex flex-wrap justify-center -mx-4">
@foreach ($evenements as $evenement)
<!-- Card -->
<div class="max-w-sm mx-auto mt-10 bg-white rounded-lg border border-gray-100 shadow-md hover:bg-gray-100">
    <img class="rounded-t-lg"  src="{{ asset('storage/images/' . $evenement->image) }}" alt="{{ $evenement->titre }}">

    <div class="p-5">
        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$evenement->titre}}</h2>
        <p class="mb-3 font-normal text-gray-700"><p class="text-gray-600 mt-2">
            {{ Str::limit($evenement->description, 100, '...') }}
        </p>
        </p>

        <div class="flex items-center text-gray-700 mb-4">
            <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
            <p class="text-sm">{{$evenement->lieu}}</p>
        </div>
        <div class="flex items-center text-gray-700 mb-4">
            <i class="fas fa-calendar-alt text-red-500 mr-2"></i>
            <p class="text-sm">{{$evenement->date}}</p>
        </div>
        <div class="flex items-center text-gray-700 mb-4">
            <i class="fas fa-users text-red-500 mr-2"></i>
            <p class="text-sm"> places disponibles : {{$evenement->place_disponible}}</p>
        </div>
        <span class="text-red-500 font-bold mb-2">15€</span>

        <div class="flex justify-between items-center">
            <a href="{{ route('event.details', ['evenement' => $evenement->id]) }}" class="text-red-500 bg-transparent border border-red-500 hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white">Détails</a>
            @if($evenement->is_in_future)
            <form action="{{ route('reservations.create', $evenement->id) }}" method="POST">
                @csrf
                <button type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Réserver
                </button>
            </form>
            @else
            <button type="button" class="text-white bg-red-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" disabled>
                Réserver
            </button>
                @endif

    @php
    $client_id = auth()->user()->client->id ?? null;
    $hasActiveReservation = \App\Models\Reservation::where('evenement_id', $evenement->id)
                                                     ->where('client_id', $client_id)
                                                     ->where('status', 0)
                                                     ->exists();
    @endphp
            @if($hasActiveReservation)

        <!-- bouton de génération de ticket -->
        <form action="{{ route('ticket', ['evenement' => $evenement->id]) }}" method="GET">
            @csrf
            <button type="submit" class="text-white bg-gray-400 hover:bg-gray-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
            ticket
            </button>
        </form>
    @endif
        </div>
    </div>
</div>
@endforeach
    </div>
    <div class="flex justify-center  my-4">
        {{ $evenements->links() }}
    </div>
    
    

<!-- FOOTER -->
<footer class="bg-black text-white mt-10">
    <div class="container mx-auto px-6 py-4">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/3 mb-6">
                <h5 class="uppercase font-bold mb-2.5">À propos</h5>
                <p>Evento est votre passerelle pour les expériences inoubliables. Réservez votre place dès maintenant et vivez l'événement de vos rêves.</p>
            </div>
            <div class="w-full md:w-1/3 mb-6">
                <h5 class="uppercase font-bold mb-2.5">Liens utiles</h5>
                <ul class="list-none mb-0">
                    <li><a class="hover:text-red-500 text-gray-500" href="#">Politique de confidentialité</a></li>
                    <li><a class="hover:text-red-500 text-gray-500" href="#">Termes & Conditions</a></li>
                    <li><a class="hover:text-red-500 text-gray-500" href="#">Contact</a></li>
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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
</html>


