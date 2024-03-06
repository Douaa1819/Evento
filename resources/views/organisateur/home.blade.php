<x-head></x-head>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Display</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .hidden { display: none; }
  </style>
</head>
<body>
    @foreach ( $evenement as $evenements )
    <div class="grid  gap-28 md:grid-cols-4">
<div class="max-w-sm mx-auto mt-10 rounded overflow-hidden shadow-lg hover:shadow-xl">
  <img class="w-full" src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8modern%20house|en|0|0|0&w=1000&q=80" alt="Property Image">
  <div class="px-6 py-4">
    
        
    
    <div class="font-bold text-xl mb-2">{{$evenements->titre}}</div>
    <p class="text-gray-700 text-base">
        {{$evenements->description}}
    </p>
  </div>
  <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mb-2">#winter</span>
  </div>
  <div class="px-6 pt-4 pb-2 flex justify-between">
<a href="{{route('modifier', ['evenment' => $evenements])}}">
    <button onclick="" class="bg-blue-500 hover:bg-black text-white font-bold py-2 px-4 rounded">
      <i class="fas fa-edit"></i> Modifier

    </button>
</a>
    <form action="{{ route('evenement.delete', $evenements->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this?')">
        @csrf
        @method('DELETE')
    <button onclick="deleteEvent()" class="bg-red-500 hover:bg-black text-white font-bold py-2 px-4 rounded">
      <i class="fas fa-trash"></i> Supprimer
    </button>
    </form>
  </div>
</div>
      @endforeach
    </div>
  </div>
</div>



</body>
</html>
