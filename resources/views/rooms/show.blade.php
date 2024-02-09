<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room {{ $room->id }}</title>
</head>
<body>
    <h1>ROOM {{ $room->id }}</h1>
    <p>NAME {{ $room->name }}</p>
    <p>HOSTEL_ID {{ $room->hostel_id }}</p>
    <form action="{{ route('rooms.reserve', ['id' => $room->id]) }}" method="POST">
        @csrf
        <button type="submit">Réserver</button>
    </form>

    <a href="{{ route('rooms.index', $room->id) }}">Retourner à la liste des rooms</a>
</body>
</html>
