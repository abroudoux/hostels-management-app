<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Create ROOM</title>
</head>
<body>
    <h1>Ajout d'une ROOM</h1>

    <hr>

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="hostel_id">Hostel ID</label>
        <input type="text" name="hostel_id" id="hostel_id">
        <br>
        <button type="submit">Ajouter</button>
    </form>

</body>
</html>
