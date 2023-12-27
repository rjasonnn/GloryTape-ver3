<!DOCTYPE html>
<html>
<head>
    <title>Warnas List</title>
</head>
<body>
<h1>Warnas</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Code</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($warnas as $warna)
        <tr>
            <td>{{ $warna->name }}</td>
            <td>{{ $warna->code }}</td>
            <td>
                <a href="{{ route('warnas.show', $warna->id) }}">Show</a>
                <a href="{{ route('warnas.edit', $warna->id) }}">Edit</a>
                <form action="{{ route('warnas.destroy', $warna->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ route('warnas.create') }}">Create New Warna</a>
</body>
</html>
