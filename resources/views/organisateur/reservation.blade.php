
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Événement</th>
                <th>Utilisateur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->evenement->titre }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>
                    <form action="{{ route('reservation.accept', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">Accepter</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
