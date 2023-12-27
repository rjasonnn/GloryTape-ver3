<!DOCTYPE html>
<html>
<head>
    <title>Create Warna</title>
</head>
<body>
<h1>Create Warna</h1>
<form action="{{ route('warnas.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="code">Code:</label>
        <input type="text" name="code" id="code">
    </div>
    <button type="submit">Create Warna</button>
</form>
</body>
</html>
