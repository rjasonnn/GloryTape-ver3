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
<h1>Create Bahan</h1>

<form action="{{ route('bahans.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="supplier">Supplier:</label>
        <input type="text" name="supplier" id="supplier" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Create Bahan</button>
</form>

</body>
</html>
