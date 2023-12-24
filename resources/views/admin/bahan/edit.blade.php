<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Edit Bahan</h1>

<form action="{{ route('bahans.update', $bahan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $bahan->name }}">
    </div>
    <div class="form-group">
        <label for="supplier">Supplier:</label>
        <input type="text" name="supplier" id="supplier" class="form-control" value="{{ $bahan->supplier }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Bahan</button>
</form>

</body>
</html>
