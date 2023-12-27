<!DOCTYPE html>
<html>
<head>
    <title>Create Delivery</title>
</head>
<body>
<h1>Create Delivery</h1>
<form action="{{ route('deliveries.store') }}" method="POST">
    @csrf
    <div>
        <label for="driver">Driver:</label>
        <input type="text" name="driver" id="driver">
    </div>
    <div>
        <label for="vehicle">Vehicle:</label>
        <input type="text" name="vehicle" id="vehicle">
    </div>
    <div>
        <label for="license_plate">License Plate:</label>
        <input type="text" name="license_plate" id="license_plate">
    </div>
    <div>
        <label for="fee">Fee:</label>
        <input type="text" name="fee" id="fee">
    </div>
    <button type="submit">Create Delivery</button>
</form>
</body>
</html>
