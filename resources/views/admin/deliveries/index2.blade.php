<!DOCTYPE html>
<html>
<head>
    <title>Deliveries List</title>
</head>
<body>
<h1>Deliveries</h1>
<table>
    <thead>
    <tr>
        <th>Driver</th>
        <th>Vehicle</th>
        <th>License Plate</th>
        <th>Fee</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($deliveries as $delivery)
        <tr>
            <td>{{ $delivery->driver }}</td>
            <td>{{ $delivery->vehicle }}</td>
            <td>{{ $delivery->license_plate }}</td>
            <td>{{ $delivery->fee }}</td>
            <td>
                <a href="{{ route('deliveries.show', $delivery->id) }}">Show</a>
                <a href="{{ route('deliveries.edit', $delivery->id) }}">Edit</a>
                <form action="{{ route('deliveries.destroy', $delivery->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ route('deliveries.create') }}">Create New Delivery</a>
</body>
</html>
