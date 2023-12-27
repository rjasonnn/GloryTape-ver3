<!DOCTYPE html>
<html>
<head>
    <title>Ukuran Details</title>
</head>
<body>
<h1>Ukuran Details</h1>
<div>
    <label>Length:</label>
    <p>{{ $ukuran->length }}</p>
</div>
<div>
    <label>Width:</label>
    <p>{{ $ukuran->width }}</p>
</div>
<div>
    <label>Height:</label>
    <p>{{ $ukuran->height }}</p>
</div>
<a href="{{ route('ukurans.index') }}">Back to Ukurans List</a>
</body>
</html>
