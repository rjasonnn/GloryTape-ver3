<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
<h1>Edit Product</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}">
    </div>
    <div>
        <label for="bahan_id">Bahan:</label>
        <select name="bahan_id" id="bahan_id">
            @foreach ($bahans as $bahan)
                <option value="{{ $bahan->id }}" {{ $product->bahan_id === $bahan->id ? 'selected' : '' }}>{{ $bahan->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="warna_id">Warna:</label>
        <select name="warna_id" id="warna_id">
            @foreach ($warnas as $warna)
                <option value="{{ $warna->id }}" {{ $product->warna_id === $warna->id ? 'selected' : '' }}>{{ $warna->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="ukuran_id">Ukuran:</label>
        <select name="ukuran_id" id="ukuran_id">
            @foreach ($ukurans as $ukuran)
                <option value="{{ $ukuran->id }}" {{ $product->ukuran_id === $ukuran->id ? 'selected' : '' }}>P:{{ $ukuran->length }}m ⨉ L:{{ $ukuran->width }}cm, ⨉ T:{{ $ukuran->height }}mm</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Update Product</button>
</form>
</body>
</html>
