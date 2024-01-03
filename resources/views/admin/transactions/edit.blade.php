@include('admin.header')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<main class="flex-1">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Transaction</h3>
                <div class="mt-3 sm:mt-0 sm:ml-4">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Wrap your content in a form tag -->

            <form action="{{ route('transactions.update', $transaction->id) }}" method="POST"
                enctype="multipart/form-data" class="max-w bg-white p-6 rounded-md">
                @csrf
                @method('PUT')
                <!-- display all error messages -->
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

                <!-- form grup for input invoice type file-->
                <div class="mb-4">
                    <label for="invoice" class="block text-sm font-medium text-gray-700">Invoice</label>
                    <img src="{{ asset('storage/' . $transaction->invoice) }}" alt="{{ $transaction->invoice }}"
                        style="width: 100px;">
                    <input type="file" name="invoice" id="invoice" accept=".jpg, .jpeg, .png, .pdf"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $transaction->invoice }}">
                    @error('invoice')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="customer" class="block text-sm font-medium text-gray-700">Customer</label>
                    <select name="customer_id" id="customer" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ $customer->id == $transaction->customer_id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- form grup for input delivery with selected delivery -->
                <div class="mb-4">
                    <label for="delivery" class="block text-sm font-medium text-gray-700">Delivery</label>
                    <select name="delivery_id" id="delivery" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($deliveries as $delivery)
                            <option value="{{ $delivery->id }}"
                                {{ $delivery->id == $transaction->delivery_id ? 'selected' : '' }}>
                                {{ $delivery->driver }}</option>
                        @endforeach
                    </select>
                    @error('delivery_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" id="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ $transaction->date }}">
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="products" class="block text-sm font-medium text-gray-700">Products</label>
                    <div class="modal fade" id="productModal" tabindex="-1" role="dialog"
                        aria-labelledby="productModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productModalLabel">Select Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Products will be populated here -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="products-container" class="mb-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction->products as $product)
                                    <tr class="product-item">
                                        <td>{{ $product->name }}</td>
                                        <input type="hidden" name="products[{{ $product->id }}][product_id]"
                                            value="{{ $product->id }}">
                                        <td><input type="number" name="products[{{ $product->id }}][quantity]"
                                                value="{{ $product->pivot->quantity }}" class="form-control"></td>
                                        <td><input type="number" name="products[{{ $product->id }}][price]"
                                                value="{{ $product->pivot->price }}" class="form-control"></td>
                                        <td><button type="button" class="btn btn-danger remove-product">Remove</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @error('products')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="button" onclick="window.location='{{ route('transactions.index') }}'"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button type="button"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            data-toggle="modal" data-target="#productModal">
                            Add Product
                        </button>
                        <button type="submit"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        // Fetch products for modal
        $('#productModal').on('show.bs.modal', function() {
            $.ajax({
                url: '/products', // Assuming a route that returns a list of products
                success: function(products) {
                    // Populate modal content with product options (e.g., a list)
                    var productList = '';
                    $.each(products, function(i, product) {
                        productList += '<li data-product-id="' + product.id + '">' +
                            product.name + '</li>';
                    });
                    $('#productModal .modal-body').html('<ul>' + productList + '</ul>');
                }
            });
        });

        // Handle product selection
        $('#productModal ul').on('click', 'li', function() {
            var productId = $(this).data('product-id');
            var productName = $(this).text();

            // Create product item element
            var productItem = $('<div class="product-item">' +
                '<p>' + productName + '</p>' +
                '<input type="hidden" name="products[' + productId + '][product_id]" value="' +
                productId + '">' +
                '<input type="number" name="products[' + productId +
                '][quantity]" value="1" class="form-control">' +
                '<input type="number" name="products[' + productId +
                '][price]" class="form-control">' +
                '<button type="button" class="btn btn-danger remove-product">Remove</button>' +
                '</div>');

            // Append to products container
            $('#products-container').append(productItem);

            // Close modal
            $('#productModal').modal('hide');
        });

        // Handle product removal
        $('#products-container').on('click', '.remove-product', function() {
            $(this).closest('.product-item').remove();
        });
    });
</script>
</body>

</html>
