<x-doashboardAdmin></x-doashboardAdmin>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <!-- Lien CDN de Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Liste des Utilisateurs</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($utilisateur as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @php
                        $isbanned = $user->client ? $user->client->is_banned : ($user->organisateur ? $user->organisateur->is_banned : false);
                        @endphp
                
                        @if(!$isbanned)
                        <form action="{{ route('admine.bloquer', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Bloquer</button>
                        </form>
                        @else
                        <form action="{{ route('admine.débloquer', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Débloquer</button>
                        </form>
                        @endif
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
