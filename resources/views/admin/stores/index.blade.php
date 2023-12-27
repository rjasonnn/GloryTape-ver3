<!DOCTYPE html>
<html>
<head>
    <title>Stores List</title>
</head>
<body>
<h1>Stores</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Region</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($stores as $store)
        <tr>
            <td>{{ $store->name }}</td>
            <td>{{ $store->region }}</td>
            <td>{{ $store->phone }}</td>
            <td>
                <a href="{{ route('stores.show', $store->id) }}">Show</a>
                <a href="{{ route('stores.edit', $store->id) }}">Edit</a>
                <form action="{{ route('stores.destroy', $store->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ route('stores.create') }}">Create New Store</a>
</body>
</html>
