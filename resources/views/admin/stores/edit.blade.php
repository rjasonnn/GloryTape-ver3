<!DOCTYPE html>
<html>
<head>
    <title>Edit Store</title>
</head>
<body>
<h1>Edit Store</h1>
<form action="{{ route('stores.update', $store->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $store->name }}">
    </div>
    <div>
        <label for="region">Region:</label>
        <input type="text" name="region" id="region" value="{{ $store->region }}">
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ $store->phone }}">
    </div>
    <button type="submit">Update Store</button>
</form>
</body>
</html>

