<!DOCTYPE html>
<html>
<head>
    <title>Delivery Details</title>
</head>
<body>
<h1>Delivery Details</h1>
<div>
    <label>Driver:</label>
    <p>{{ $delivery->driver }}</p>
</div>
<div>
    <label>Vehicle:</label>
    <p>{{ $delivery->vehicle }}</p>
</div>
<div>
    <label>License Plate:</label>
    <p>{{ $delivery->license_plate }}</p>
</div>
<div>
    <label>Fee:</label>
    <p>{{ $delivery->fee }}</p>
</div>
<a href="{{ route('deliveries.index') }}">Back to Deliveries List</a>
</body>
</html>
