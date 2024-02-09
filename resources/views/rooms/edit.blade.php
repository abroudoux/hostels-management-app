<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit ROOM</title>
</head>
<body>
    <h1>Modification d'une ROOM</h1>

    <hr>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $room->name }}">
        <br>
        <label for="hostel_id">hostel_id</label>
        <input type="text" name="hostel_id" id="hostel_id" value="{{ $room->hostel_id }}">
        <br>
        <button type="submit">Ajouter</button>
    </form>

</body>
</html>