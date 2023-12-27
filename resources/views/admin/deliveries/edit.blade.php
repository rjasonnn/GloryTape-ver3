<!DOCTYPE html>
<html>
<head>
    <title>Edit Delivery</title>
</head>
<body>
<h1>Edit Delivery</h1>
<form action="{{ route('deliveries.update', $delivery->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="driver">Driver:</label>
        <input type="text" name="driver" id="driver" value="{{ $delivery->driver }}">
    </div>
    <div>
        <label for="vehicle">Vehicle:</label>
        <input type="text" name="vehicle" id="vehicle" value="{{ $delivery->vehicle }}">
    </div>
    <div>
        <label for="license_plate">License Plate:</label>
        <input type="text" name="license_plate" id="license_plate" value="{{ $delivery->license_plate }}">
    </div>
    <div>
        <label for="fee">Fee:</label>
        <input type="text" name="fee" id="fee" value="{{ $delivery->fee }}">
    </div>
    <button type="submit">Update Delivery</button>
</form>
</body>
</html>
