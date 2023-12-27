<!DOCTYPE html>
<html>
<head>
    <title>Create Store</title>
</head>
<body>
<h1>Create Store</h1>
<form action="{{ route('stores.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="region">Region:</label>
        <input type="text" name="region" id="region">
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone">
    </div>
    <button type="submit">Create Store</button>
</form>
</body>
</html>
