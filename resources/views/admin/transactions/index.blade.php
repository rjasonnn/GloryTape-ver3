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
<table class="table">
    <thead>
    <tr>
        <th>Invoice</th>
        <th>Date</th>
        <th>Customer</th>
        <th>Delivery</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($transactions as $transaction)
        <tr>
            <td><a href="{{ route('transactions.show', $transaction->id) }}">{{ $transaction->invoice }}</a></td>
            <td>{{ $transaction->date }}</td>
            <td>{{ $transaction->customer->name }}</td>
            <td>{{ $transaction->delivery->name }}</td>
            <td>
                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
