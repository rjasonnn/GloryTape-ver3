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
<h1>Edit Catalog</h1>

<form action="{{ route('catalogs.update', $catalog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="image_path">Image:</label>
        <img src="{{ asset($catalog->image_path) }}" alt="{{ $catalog->description }}" style="width: 100px;">
        <input type="file" name="image_path" id="image_path" class="form-control">
    </div>
    <div class="form-group">

</body>
</html>
