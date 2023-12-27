<!DOCTYPE html>
<html>
<head>
    <title>Create Ukuran</title>
</head>
<body>
<h1>Create Ukuran</h1>
<form action="{{ route('ukurans.store') }}" method="POST">
    @csrf
    <div>
        <label for="length">Length:</label>
        <input type="text" name="length" id="length">
    </div>
    <div>
        <label for="width">Width:</label>
        <input type="text" name="width" id="width">
    </div>
    <div>
        <label for="height">Height:</label>
        <input type="text" name="height" id="height">
    </div>
    <button type="submit">Create Ukuran</button>
</form>
</body>
</html>
