<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel {{ $hostel->id }}</title>
</head>
<body>
    <h1>HOSTEL {{ $hostel->id }}</h1>
    <p>NAME {{ $hostel->name }}</p>
    <p>LOCATION {{ $hostel->location }}</p>

    <h2>CHAMBRES DISPONIBLES :</h2>
    @if (count($roomsAvaibles) === 0)
        <p>Aucune chambre disponible.</p>
    @else
        <ul>
            @foreach ($roomsAvaibles as $room)
                <li>{{ $room->name }} - {{ $room->is_reserved }}</p>
                <form action="{{ route('rooms.reserve', ['id' => $room->id]) }}" method="POST">
                    @csrf
                    <button type="submit">Réserver</button>
                </form>
            @endforeach
        </ul>
    @endif

    <h2>CHAMBRES NON DISPONIBLES :</h2>
    @if (count($roomsNonAvaibles) === 0)
        <p>Aucune chambre non disponible.</p>
    @else
        <ul>
            @foreach ($roomsNonAvaibles as $room)
                <li>{{ $room->name }}</p>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('hostels.index', $hostel->id) }}">Retourner à la liste des hôtels</a>
</body>
</html>
