<x-doashboardAdmin></x-doashboardAdmin>
<div class="container mx-auto mt-8">
    <div class="max-w-xl mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
        <img src="{{ asset('storage/images/' . $evenement->image) }}" class="w-full h-56 object-cover" alt="Image de l'événement">
        <div class="p-4">
            <h5 class="text-2xl font-bold text-gray-900">{{ $evenement->titre }}</h5>
            <p class="mt-2 text-gray-600"><strong>Date:</strong> {{ $evenement->date }}</p>
            <p class="text-gray-600"><strong>Lieu:</strong> {{ $evenement->lieu }}</p>
            <p class="text-gray-600"><strong>places disponible:</strong> {{ $evenement->place_disponible }}</p>
            <p class="mt-4 text-gray-700">{{ $evenement->description }}</p>
            <a href="{{ route('validation') }}" class="mt-4 inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Retour à la liste des événements</a>
        </div>
    </div>
</div>

