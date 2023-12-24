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
<h1>Bahans</h1>

<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Supplier</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bahans as $bahan)
        <tr>
            <td>{{ $bahan->name }}</td>
            <td>{{ $bahan->supplier }}</td>
            <td>
                <a href="{{ route('bahans.show', $bahan->id) }}" class="btn btn-sm btn-primary">Show</a>
                <a href="{{ route('bahans.edit', $bahan->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                <form action="{{ route('bahans.destroy', $bahan->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="{{ route('bahans.create') }}" class="btn btn-primary">Create Bahan</a>

</body>
</html>
