<!DOCTYPE html>
<html>
<head>
    <title>Store Details</title>
</head>
<body>
<h1>Store Details</h1>
<div>
    <label>Name:</label>
    <p>{{ $store->name }}</p>
</div>
<div>
    <label>Region:</label>
    <p>{{ $store->region }}</p>
</div>
<div>
    <label>Phone:</label>
    <p>{{ $store->phone }}</p>
</div>
<a href="{{ route('stores.index') }}">Back to Stores List</a>
</body>
</html>
