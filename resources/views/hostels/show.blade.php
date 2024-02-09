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

    <h1>CHAMBRES ASSOCIÉES :</h1>
    <ul>
        @foreach ($rooms as $room)
            <li>{{ $room->name }} - {{ $room->is_reserved }}</p>
        @endforeach
    </ul>

    <a href="{{ route('hostels.index', $hostel->id) }}">Retourner à la liste des hôtels</a>
</body>
</html>
