<x-head></x-head>
<x-doashbordOrganisateur>
</x-dashboardOrganisateur>
<body>
    <body>
        <div class="flex flex-wrap justify-center gap-4 mt-10">
          @foreach ($evenement as $evenements)
          <!-- Ajustement pour deux cartes par ligne avec un espacement approprié -->
          <div class="w-full md:w-1/2 xl:w-1/2 p-4">
            <div class="flex flex-col h-full rounded-lg bg-gray-200 overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
              <img class="w-full flex-shrink-0" src="{{ asset('storage/images/' . $evenements->image) }}" alt="{{ $evenements->titre }}">
              <div class="flex-grow p-4">
                <h3 class="text-lg font-bold mb-2">{{$evenements->titre}}</h3>
                <p class="text-gray-600 text-sm mb-4">
                  {{ Str::limit($evenements->description, 100, '...') }}
                </p>
                <div class="flex items-center text-sm mb-2">
                  <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                  <p>{{$evenements->lieu}}</p>
                </div>
                <div class="flex items-center text-sm mb-2">
                  <i class="fas fa-calendar-alt text-red-500 mr-2"></i>
                  <p>{{$evenements->date}}</p>
                </div>
                <div class="flex items-center text-sm mb-4">
                  <i class="fas fa-users text-red-500 mr-2"></i>
                  <p>{{$evenements->place_disponible}} places disponibles</p>
                </div>
              </div>
              <div class="px-4 pb-4 mt-auto">
                <div class="flex justify-between space-x-2">
                  <!-- Boutons ajustés pour être flexibles avec la taille de la carte -->
                  <a href="{{route('modifier', ['evenment' => $evenements])}}" class="flex-1 flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition-colors duration-200 ease-in-out text-xs sm:text-sm">
                    <i class="fas fa-edit mr-2"></i> Modifier
                  </a>
                  <form action="{{ route('evenement.delete', $evenements->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this?')" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button onclick="openModal('{{ route('evenement.delete', $evenements->id) }}')" class="w-full flex items-center justify-center bg-red-500 hover:bg-red-700 text-white font-medium py-2 px-4 rounded transition-colors duration-200 ease-in-out text-xs sm:text-sm">
                        <i class="fas fa-trash mr-2"></i> Supprimer
                      </button>
                  </form>
                  @if($evenements->validation == '1')
                  <form action="{{ route('evenement.reservations', $evenements->id) }}" method="GET" class="flex-1">
                    @csrf
                    <button class="w-full flex items-center justify-center bg-green-500 hover:bg-green-700 text-white font-medium py-2 px-4 rounded transition-colors duration-200 ease-in-out text-xs sm:text-sm">
                      <i class="fas fa-ticket-alt mr-2"></i> Réservations
                    </button>
                  </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>






    </body>
  
     
      