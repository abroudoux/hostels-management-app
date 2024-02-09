<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Create HOSTEL</title>
</head>
<body>
    <h1>Ajout d'un HOTEL</h1>

    <hr>

    <form action="{{ route('hostels.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="location">Location</label>
        <input type="text" name="location" id="location">
        <br>
        <button type="submit">Ajouter</button>
    </form>

</body>
</html>
