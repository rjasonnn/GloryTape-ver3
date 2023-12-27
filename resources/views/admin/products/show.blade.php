<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
<h1>Product Details</h1>
<div>
    <label>Name:</label>
    <p>{{ $product->name }}</p>
</div>
<div>
    <label>Bahan:</label>
    <p>{{ $product->bahan->name }}</p>
</div>
<div>
    <label>Warna:</label>
    <p>{{ $product->warna->name }}</p>
</div>
<div>
    <label>Ukuran:</label>
    <p>{{ $product->ukuran->name }}</p>
</div>
<div>
    <a href="{{ route('products.index') }}">Back to Products List</a>
</div>
</body>
</html>
