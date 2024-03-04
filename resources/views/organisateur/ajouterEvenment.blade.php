
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/image/licon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>travel</title>
</head>
<body>
    {{-- add Evenments --}}
    <form method="POST" action="{{route('recit.store')}}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('post')

        <div class="grid gap-4 mb-4 grid-cols-1 md:grid-cols-2 mx-4">
            <div>
                <label for="Titre" class="block mb-2 text-sm font-medium text-gray-900">Titre</label>
                <input type="text" name="Titre" id="Titre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="entrer le titre de l'évenment" required>
            </div>
            <div>
                <label for="Catégorie" class="block mb-2 text-sm font-medium text-gray-900">Categorie</label>
                <select id="destination" required name="id_destination" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                    <option selected>Choisi la Catégorie</option>
                    @foreach ($catégorie as $categories)
                    <option value="{{$categories->id}}">{{$categories->nomDestination}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="ville">Lieu:</label>
                <select name="Lieu" id="Lieu" required>
                    <option value="">Sélectionnez une ville</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Rabat">Rabat</option>
                    <option value="Fès">Fès</option>
                    <option value="Marrakech">Marrakech</option>
                    <option value="Agadir">Agadir</option>
                    <option value="Tanger">Tanger</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <input type="file" id="uploadImages" class="block w-full text-sm text-gray-900 mb-2" name="images[]" multiple>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900"> Description de l'événement</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500" placeholder="Write adventure description here" required></textarea>
            </div>
            <label for="dateEvenment">Date de l'événement:</label>
            <input type="date" id="dateEvenment" name="dateEvenment" required>
        <div class="text-center">
            <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                ajouter un nouvel événement
            </button>
        </div>
    </form>
</body>
</html>