<!DOCTYPE html>
<html>
<head>
    <title>Edit Ukuran</title>
</head>
<body>
<h1>Edit Ukuran</h1>
<form action="{{ route('ukurans.update', $ukuran->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="length">Length:</label>
        <input type="text" name="length" id="length" value="{{ $ukuran->length }}">
    </div>
    <div>
        <label for="width">Width:</label>
        <input type="text" name="width" id="width" value="{{ $ukuran->width }}">
    </div>
    <div>
        <label for="height">Height:</label>
        <input type="text" name="height" id
