<!DOCTYPE html>
<html>
<head>
    <title>Ukurans List</title>
</head>
<body>
<h1>Ukurans</h1>
<table>
    <thead>
    <tr>
        <th>Length</th>
        <th>Width</th>
        <th>Height</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($ukurans as $ukuran)
        <tr>
            <td>{{ $ukuran->length }}</td>
            <td>{{ $ukuran->width }}</td>
            <td>{{ $ukuran->height }}</td>
            <td>
                <a href="{{ route('ukurans.show', $ukuran->id) }}">Show</a>
                <a href="{{ route('ukurans.edit', $ukuran->id) }}">Edit</a>
                <form action="{{ route('ukurans.destroy', $ukuran->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ route('ukurans.create') }}">Create New Ukuran</a>
</body>
</html>
