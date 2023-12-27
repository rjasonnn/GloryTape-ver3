<!DOCTYPE html>
<html>
<head>
    <title>Customers List</title>
</head>
<body>
<h1>Customers</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
                <a href="{{ route('customers.show', $customer->id) }}">Show</a>
                <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ route('customers.create') }}">Create New Customer</a>
</body>
</html>
