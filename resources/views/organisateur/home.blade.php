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
<div class="max-w-sm mx-auto mt-10 rounded bg-gray-200 overflow-hidden shadow-lg hover:shadow-xl">

  <div class="px-6 py-4"> 
      <h3 class="text-lg font-bold">{{$evenements->titre}}</h3>
      <p class="text-gray-600 mt-2">{{$evenements->description}}.</p>
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
