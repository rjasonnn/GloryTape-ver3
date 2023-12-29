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
<div class="container">
    <h1>Transaction Details</h1>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Invoice:</strong> <a href="{{ Storage::url($transaction->invoice) }}">{{ $transaction->invoice }}</a></p>
            <p><strong>Date:</strong> {{ $transaction->date }}</p>
            <p><strong>Customer:</strong> {{ $transaction->customer->name }}</p>
            <p><strong>Delivery:</strong> {{ $transaction->delivery->driver }}</p>
        </div>
    </div>

    <h2>Products</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transaction->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->pivot->price }}</td>
                <td>{{ $product->pivot->quantity * $product->pivot->price }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="3">Grand Total</th>
            <th>{{ $transaction->total }}</th>
        </tr>
        </tfoot>
    </table>

    <a href="{{ route('transactions.index') }}" class="btn btn-primary">Back to Transactions</a>
</div>

</body>
</html>
