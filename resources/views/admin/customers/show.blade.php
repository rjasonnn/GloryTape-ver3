<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
</head>
<body>
<h1>Customer Details</h1>
<div>
    <label>Name:</label>
    <p>{{ $customer->name }}</p>
</div>
<div>
    <label>Address:</label>
    <p>{{ $customer->address }}</p>
</div>
<div>
    <label>Phone:</label>
    <p>{{ $customer->phone }}</p>
</div>
<a href="{{ route('customers.index') }}">Back to Customers List</a>
</body>
</html>
