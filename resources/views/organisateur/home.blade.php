<x-head></x-head>
<x-doashbordOrganisateur>
</x-doashbordOrganisateur>
<body>
  <div class="flex flex-row flex-wrap justify-center gap-4 mt-10">
  @foreach ($evenement as $evenements)
  <div class="max-w-sm rounded bg-gray-200 overflow-hidden shadow-lg hover:shadow-xl">
          <div class="max-w-sm mx-auto mt-10 rounded bg-gray-200 overflow-hidden shadow-lg hover:shadow-xl">
              <div class="px-6 py-4">
                <img class="w-full" src="{{ asset('storage/images/' . $evenements->image) }}" alt="{{ $evenements->titre }}">
                  <h3 class="text-lg font-bold">{{$evenements->titre}}</h3>
                  <p class="text-gray-600 mt-2">
                    {{ Str::limit($evenements->description, 100, '...') }}
                </p>                
                  <div class="flex items-center mt-4">
                      <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                      <p>{{$evenements->lieu}}</p>
                  </div>
                  <div class="flex items-center mt-2">
                      <i class="fas fa-calendar-alt text-red-500 mr-2"></i>
                      <p>{{$evenements->date}}</p>
                  </div>
                  <div class="flex items-center mt-2">
                      <i class="fas fa-users text-red-500 mr-2"></i>
                      <p>{{$evenements->place_disponible}}</p>
                  </div>
              </div>

              <div class="px-6 pt-4 pb-2 flex justify-between space-x-2">
                  <a href="{{route('modifier', ['evenment' => $evenements])}}">
                      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded inline-flex items-center">
                          <i class="fas fa-edit"></i> Modifier
                      </button>
                  </a>
                  <form action="{{ route('evenement.delete', $evenements->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this?')">
                      @csrf
                      @method('DELETE')
                      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-flex items-center">
                          <i class="fas fa-trash"></i> Supprimer
                      </button>
                  </form>
                  @if($evenements->validation == '1')
                  <form action="{{ route('evenement.reservations', $evenements->id) }}" method="GET">
                      @csrf
                      <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-flex items-center">
                          <i class="fas fa-ticket-alt"></i> réservations
                      </button>
                  </form>
              @endif
              
              
              </div>
          </div>
      </div>
  @endforeach
</body>
