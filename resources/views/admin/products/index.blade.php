<!DOCTYPE html>
<html>
<head>
    <title>Products List</title>
</head>
<body>
<h1>Products</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Bahan</th>
        <th>Warna</th>
        <th>Ukuran</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->bahan->name }}</td> <td>{{ $product->warna->name }}</td> <td>{{ $product->ukuran->name }}</td> <td>
                <a href="{{ route('products.show', $product->id) }}">Show</a>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ route('products.create') }}">Create New Product</a>
</body>
</html>
