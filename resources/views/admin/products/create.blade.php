<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
<h1>Create Product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="bahan_id">Bahan:</label>
        <select name="bahan_id" id="bahan_id">
            @foreach ($bahans as $bahan)
                <option value="{{ $bahan->id }}">{{ $bahan->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="warna_id">Warna:</label>
        <select name="warna_id" id="warna_id">
            @foreach ($warnas as $warna)
                <option value="{{ $warna->id }}">{{ $warna->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="ukuran_id">Ukuran:</label>
        <select name="ukuran_id" id="ukuran_id">
            @foreach ($ukurans as $ukuran)
                <option value="{{ $ukuran->id }}">{{ $ukuran->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Create Product</button>
</form>
</body>
</html>
