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
<h1>Catalogs</h1>

<table class="table">
    <thead>
    <tr>
        <th>Image</th>
        <th>Description</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($catalogs as $catalog)
        <tr>
            <td><img src="{{ asset($catalog->image_path) }}" alt="{{ $catalog->description }}" style="width: 100px;"></td>
            <td>{{ $catalog->description }}</td>
            <td>{{ $catalog->start_date }}</td>
            <td>{{ $catalog->end_date }}</td>
            <td>
                <a href="{{ route('catalogs.show', $catalog->id) }}" class="btn btn-sm btn-primary">Show</a>
                <a href="{{ route('catalogs.edit', $catalog->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                <form action="{{ route('catalogs.destroy', $catalog->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="{{ route('catalogs.create') }}" class="btn btn-primary">Create Catalog</a>

</body>
</html>
