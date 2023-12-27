<!DOCTYPE html>
<html>
<head>
    <title>Edit Warna</title>
</head>
<body>
<h1>Edit Warna</h1>
<form action="{{ route('warnas.update', $warna->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $warna->name }}">
    </div>
    <div>
        <label for="code">Code:</label>
        <input type="text" name="code" id="code" value="{{ $warna->code }}">
    </div>
    <button type="submit">Update Warna</button>
</form>
</body>
</html>
