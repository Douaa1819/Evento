
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<div class="container mt-5">
    @if ($reservations->isEmpty())
    <div class="alert alert-info" role="alert">
        Aucune réservation trouvée pour cet événement.
    </div>
@else
    <table class="table table-bordered">
        <thead>
                <th>Utilisateur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->client->user->name }}</td>
                <td>
                    <form action="{{ route('reservation.accept', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle mr-2"></i> Accepter
                        </button>
                    </form>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif