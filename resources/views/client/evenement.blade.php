<x-head></x-head>
<header class="bg-white border-b border-gray-100 shadow-xl">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="{{route('client.home')}}" class="flex items-center">
            <img src="{{asset('images/licon.png')}}" alt="Evento Logo" class="h-8 mr-2">
            <span class="text-xl font-bold text-gray-800">Evento</span>
        </a>
        <nav class="flex space-x-4">
            <a href="#" class="hover:text-red-500">Accueil</a>
            <a href="#" class="hover:text-red-500">Événements</a>
            <a href="#" class="hover:text-red-500">Contact</a>
            <a href="{{ route('logout.perform') }}" class="hover:text-red-500">Logout</a>
        </nav>
    </div>
</header>


<!-- Page Content -->
<div class="container mx-auto px-4">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-10">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{$evenement->titre}}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Détails de l'événement.
            </p>
        </div>
        
        <div class="border-t border-gray-200">
            <div class="bg-white px-4 py-5 sm:px-6">
                <img src="{{ asset('storage/images/' . $evenement->image) }}" alt="{{ $evenement->titre }}" class="w-full object-cover sm:rounded-lg">
            </div>

            <div class="bg-white px-4 py-5 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Description
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$evenement->description}}
                </dd>
            </div>
            <dl>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Lieu
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$evenement->lieu}}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Date et Heure
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$evenement->date}}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Places disponibles
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$evenement->place_disponible}}
                    </dd>
                </div>
               
            
            </dl>
        </div>
    </div>

    <!-- Buttons -->
    <div class="flex justify-between items-center mt-6">
        <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Retour
        </a>
        <form action="{{ route('reservations.create', $evenement->id) }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Réserver maintenant
            </button>
        </form>
    </div>
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






