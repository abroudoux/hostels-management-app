<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostels</title>
</head>
<body>
    <h1>HOSTELS</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hostels as $hostel)
                <tr>
                    <td>{{ $hostel->id }}</td>
                    <td>{{ $hostel->name }}</td>
                    <td>{{ $hostel->location }}</td>
                    <td>
                        <a href="{{ route('hostels.edit', $hostel->id) }}">Modifier</a>
                        <hr>
                        <form action="{{ route('hostels.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $hostel->id }}" name="id">
                            <button type="submit">Supprimer</button>
                        </form>
                        <hr>
                        <a href="{{ route('hostels.show', $hostel->id) }}">Détails</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <a href="{{ route('hostels.create') }}">Ajouter un hotel</a>
    <hr>

</body>
</html>
