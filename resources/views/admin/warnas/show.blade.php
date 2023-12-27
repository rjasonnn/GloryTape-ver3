<!DOCTYPE html>
<html>
<head>
    <title>Warna Details</title>
</head>
<body>
<h1>Warna Details</h1>
<div>
    <label>Name:</label>
    <p>{{ $warna->name }}</p>
</div>
<div>
    <label>Code:</label>
    <p>{{ $warna->code }}</p>
</div>
<a href="{{ route('warnas.index') }}">Back to Warnas List</a>
</body>
</html>
