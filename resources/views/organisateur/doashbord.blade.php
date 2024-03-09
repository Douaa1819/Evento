<x-head></x-head>
<x-doashbordOrganisateur></x-doashbordOrganisateur>
<div class="flex flex-wrap items-center mt-8 space-x-8 justify-center">
    <!-- Carte pour le nombre total d'événements  -->
    <div class="w-full md:w-1/3 px-4 py-4 h-32 bg-white  shadow-xl rounded-lg flex items-center">
        <i class="fas fa-calendar-alt fa-2x text-red-500 mr-4"></i>
        <div>
            <p class="text-sm text-gray-400">
                Nombre d'événements :
            </p>
            <p class="text-2xl font-bold text-black">
               {{ (count($evenements))}}
            </p>

        </div>
    </div>

    <!-- Cartes pour le nombre de réservations pour chaque événement -->
    @foreach ($evenements as $evenement)
    <div class="w-full md:w-1/3  px-4 py-4 h-32 bg-white  shadow-xl  mt-5 rounded-lg flex items-center">
        <i class="fas fa-users fa-2x text-gray-800 mr-4"></i>
        <div>
            
            <h2 class="text-xl font-bold text-black">{{ $evenement->titre }}</h2>
            <p class="text-sm text-gray-400">
                Nombre de réservations:
            </p>
            {{--  attribut dynamiquement fait par WithCount --}}
            {{ $evenement->reservation_count }}

        </div>
    </div>
    @endforeach
</div>
