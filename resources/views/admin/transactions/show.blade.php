@include('admin.header')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<main class="flex-1">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Transaction Details</h3>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="bg-white p-4 rounded-md mb-4">
                <div class="mb-2">
                    <label class="font-semibold">Invoice:</label>
                    <a href="{{ Storage::url($transaction->invoice) }}">{{ $transaction->invoice }}</a>
                </div>
                <div class="mb-2">
                    <label class="font-semibold">Date:</label>
                    <p class="text-gray-800">{{ $transaction->date }}</p>
                </div>
                <div class="mb-2">
                    <label class="font-semibold">Customer:</label>
                    <p class="text-gray-800">{{ $transaction->customer->name }}</p>
                </div>
                <div class="mb-2">
                    <label class="font-semibold">Delivery:</label>
                    <p class="text-gray-800">{{ $transaction->delivery->driver }}</p>
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
            </table>

            <a href="{{ route('transactions.index') }}"
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back
                to Transactions</a>
        </div>
    </div>
</main>
@include('admin.footer')