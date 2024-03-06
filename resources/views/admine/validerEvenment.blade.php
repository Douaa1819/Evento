<x-doashboardAdmin></x-doashboardAdmin>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Email de l'Organisateur</th>
                    <th scope="col">Nom de l'Organisateur</th>
                    <th scope="col">Titre de l'Événement</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evenements as $evenement)
                <tr>
                    <td>{{$evenement->organisateur->user->name }} </td>
                    <td>{{$evenement->organisateur->user->email}} </td>
                    {{-- <td>{{ $evenement->organisateur->user->email }}</td> --}}
                    <td>{{ $evenement->titre }}</td>
                    <td>
                        <form action="{{ route('valider', $evenement->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Valider</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
