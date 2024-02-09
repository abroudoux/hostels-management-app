<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
</head>
<body>
    <h1>ROOMS</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Hostel ID</th>
                <th>Is Reserved ?</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->location }}</td>
                    <td>{{ $room->is_reserved }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room->id) }}">Modifier</a>
                        <hr>
                        <form action="{{ route('rooms.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $room->id }}" name="id">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <a href="{{ route('rooms.create') }}">Ajouter une room</a>
    <hr>

</body>
</html>
