<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>
<h1>Edit Customer</h1>
<form action="{{ route('customers.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $customer->name }}">
    </div>
    <div>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="{{ $customer->address }}">
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ $customer->phone }}">
    </div>
    <button type="submit">Update Customer</button>
</form>
</body>
</html>
