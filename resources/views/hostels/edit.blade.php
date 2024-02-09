<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit HOSTEL</title>
</head>
<body>
    <h1>Modification d'un HOTEL</h1>

    <hr>

    <form action="{{ route('hostels.update', $hostel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $hostel->name }}">
        <br>
        <label for="location">Location</label>
        <input type="text" name="location" id="location" value="{{ $hostel->location }}">
        <br>
        <button type="submit">Ajouter</button>
    </form>

</body>
</html>