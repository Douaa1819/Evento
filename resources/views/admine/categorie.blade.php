<x-doashboardAdmin></x-doashboardAdmin>
<div class="container mx-auto mt-5 ">

    <h2 class="text-xl font-bold mb-4 mx-5">Liste des Catégories</h2>

    <div class="flex justify-end mb-2 ">
        <button id="openAddModal" class="bg-green-500 hover:bg-green-700 text-white mx-2 font-bold py-2 px-4 rounded inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter
        </button>
    </div>
    @if(session('success'))
    <div class="flex items-center p-4 mb-4 text-sm mx-8 text-blue-800 rounded-lg bg-blue-100 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        {{ session('success') }}
    </div>
@endif

<div class="container mx-auto mt-5 flex justify-center">
    <table class="table-auto w-auto mt-3 mb-4">
        <thead>
            <tr>
                <th class="border px-4 py-2">Nom</th>
                <th class="border px-4 py-2">Opération</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorie as $cat)
            <tr>
                <td class="border px-4 py-2">{{ $cat->nom }}</td>
                <td class="border px-4 py-2 flex justify-around">
                    <!-- Bouton Modifier -->
<button class="btn-edit bg-blue-500 hover:bg-blue-700 text-white mx-4 font-bold py-1 px-2 rounded flex items-center" data-id="{{ $cat->id }}" data-nom="{{ $cat->nom }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
    </svg>
    Modifier
</button>
<!-- Formulaire de Suppression -->
        <form action="{{ route('categorie.delete', $cat->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this?')">
            @csrf
            @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Supprimer
                </button>
            </form>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



<!-- Pop-up Ajouter Catégorie -->
<div id="addModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-4 rounded-lg max-w-sm mx-auto">
        <form action="{{route('catégorie.sotre')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="specialiteNom" class="block text-gray-700 text-sm font-bold mb-2">Nom de Catégorie:</label>
                <input type="text" name="nom" id="specialiteNom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded " type="submit">
                    Ajouter
                </button>
                <button type="button" id="closeAddModal" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Fermer
                </button>
            </div>
        </form>        
    </div>
</div>


<!-- Pop-up de Modification -->
<div id="modalEdit" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <form id="editForm"  action="" method="POST">

            @csrf
            <input type="hidden" name="_method" value="PUT">
            @method('PUT')
            <div class="mb-4">
                <label for="editNom" class="block text-gray-700 text-sm font-bold mb-2">Nom de Catégorie</label>
                <input type="text" id="editNom" name="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Modifier
                </button>
                <button type="button" id="closeEditModal" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Fermer
                </button>
            </div>
        </form>
    </div>
</div>



<script>
    document.getElementById('openAddModal').addEventListener('click', function() {
        document.getElementById('addModal').classList.remove('hidden');
    });

    document.getElementById('closeAddModal').addEventListener('click', function() {
        document.getElementById('addModal').classList.add('hidden');
    });
    </script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.btn-edit');
        const modalEdit = document.getElementById('modalEdit');
        const closeEditModal = document.getElementById('closeEditModal');
    
    editButtons.forEach(button => {
    button.addEventListener('click', function() {
        const id = button.getAttribute('data-id');
        const nom = button.getAttribute('data-nom');
        const form = document.getElementById('editForm');
        form.action = `/Catégorie/Modifier/${id}`; 

        document.getElementById('editNom').value = nom;
        modalEdit.classList.remove('hidden');
    });
});

    
        closeEditModal.addEventListener('click', function() {
            modalEdit.classList.add('hidden');
        });
    });
    </script>
    
    
    
</body>
