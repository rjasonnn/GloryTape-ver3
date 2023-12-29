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
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <!-- display all error messages -->
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <!-- end loop -->
            </ul>
        </div>
    @endif
    <div class="form-group">
        <label for="image_path">Image:</label>
        <img src="{{ asset("storage/" . $catalog->image_path) }}" alt="{{ $catalog->description }}" style="width: 100px;">
        <input type="file" name="image_path" id="image_path" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $catalog->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $catalog->start_date }}">
    </div>
    <div class="form-group">
        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $catalog->end_date }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Catalog</button>
</form>
</body>
</html>
