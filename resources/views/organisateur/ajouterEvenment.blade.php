


@if($errors->any())
<div class="border rounded-lg shadow relative max-w-sm">
    <div class="flex justify-end p-2">
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <div class="p-6 pt-0 text-center">
        <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">{{ $errors->first() }}</h3>
        <a href="#"
            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
            OK
        </a>
    </div>
</div>
@endif
<body class="bg-black">

    
    <form method="POST" action="{{route('organisateur.add')}}" enctype="multipart/form-data" class="max-w-4xl mx-auto py-8 px-4 mt-7 sm:px-6 lg:px-8 bg-gray-100 shadow rounded-lg">
        @csrf
        @method('post')

        <x-head></x-head>

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
                <input type="text" name="titre" id="titre" class="mt-1 block w-full rounded-md border-gray-900 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" placeholder="Entrer le titre de l'événement" required>
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
                <input type="number" name="place_disponible" id="place_disponible" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" placeholder="Nombre de places disponibles" required>
            </div>
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description de l'événement</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" placeholder="Écrivez la description de l'événement ici" required></textarea>
            </div>
            <div>
                <label for="dateEvenement" class="block text-sm font-medium text-gray-700">Date de l'événement</label>
                <input type="date" name="date" id="dateEvenement" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" required>
            </div>
            <div>
                <label for="validation" class="block text-sm font-medium text-gray-700">Validation par</label>
                <select name="validation" id="validation" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" required>
                    <option value="1">Manuelle</option>
                    <option value="0">Automatique</option>
                </select>
            </div>
        </div>

        <div class="md:col-span-2">
            <label for="image" class="block text-sm font-medium text-gray-700">Image de l'événement</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" required>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Ajouter un nouvel événement
            </button>
            <a href="{{route('organisateur.index')}}" class="bg-gray-500 mx-4 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Retour
            </a>
        </div>
        <x-input-error :messages="$errors->all()" class="mt-2" />
    </form>
</body>
</html>
