<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
</head>
<body>
<h1>Create Customer</h1>
<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address">
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone">
    </div>
    <button type="submit">Create Customer</button>
</form>
</body>
</html>
