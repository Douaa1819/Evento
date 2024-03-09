<x-head></x-head>
<body class="bg-black">
    
    <form id="editEventForm" action="{{ route('evenement.update', $evenment) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

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
        <input type="hidden" name="organizateur_id" value="{{Auth::user()->Organizateur->id}}">
        
        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label for="titre" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" name="titre" id="titre" value="{{$evenment->titre}}" class="mt-1 block w-full rounded-md border-gray-900 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" placeholder="Entrer le titre de l'événement" required>
            </div>
            <div> 
                <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select id="categorie" name="category_id" class="mt-1 block w-full rounded-md border-gray-900 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" required>
                    <option selected disabled>Choisissez la Catégorie</option>
                    @foreach ($categorie as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="lieu" class="block text-sm font-medium text-gray-700">Lieu</label>
                <select id="lieu" name="lieu" class="mt-1 block w-full rounded-md border-gray-900 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" required>
                    <option selected disabled>Sélectionnez une ville</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Rabat">Rabat</option>
                    <option value="Fès">Fès</option>
                    <option value="Marrakech">Marrakech</option>
                    <option value="Agadir">Agadir</option>
                    <option value="Tanger">Tanger</option>
                </select>
            </div>
            <div>
                <label for="place_disponible" class="block text-sm font-medium text-gray-700">Places Disponibles</label>
                <input type="number" name="place_disponible" id="place_disponible" value="{{$evenment->place_disponible}}" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" placeholder="Nombre de places disponibles" required>
            </div>
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description de l'événement</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" placeholder="Écrivez la description de l'événement ici" required>{{ $evenment->description }}</textarea>
            </div>
            <div>
                <label for="dateEvenement" class="block text-sm font-medium text-gray-700">Date de l'événement</label>
                <input type="date" name="date" id="dateEvenement"  value="{{$evenment->date}}"class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" required>
            </div>
            <div>
                <label for="validation" class="block text-sm font-medium text-gray-700">Validation par</label>
                <select name="validation" id="validation" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" required>
                    <option value="1">Manuelle</option>
                    <option value="0">Automatique</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label for="image" class="block text-sm font-medium text-gray-700">Image de l'événement</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" required>
            </div>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Modifier l'événement
            </button>

            <a href="{{route('organisateur.index')}}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Retour
            </a>
        </div>
        <x-input-error :messages="$errors->all()" class="mt-2" />
    </form>
</body>
</html>
