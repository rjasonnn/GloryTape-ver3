<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<!-- Wrap your content in a form tag -->

<form action="{{ route('transactions.update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
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
    <div class="form-group">
        <label for="invoice">Invoice</label>
        <img src="{{ asset("storage/" . $transaction->invoice) }}" alt="{{ $transaction->invoice }}" style="width: 100px;">
        <input type="file" name="invoice" id="invoice" accept=".jpg, .jpeg, .png, .pdf" class="form-control" value="{{$transaction->invoice}}">
        @error('invoice')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <div class="form-group">
        <label for="customer">Customer</label>
        <select name="customer_id" id="customer" class="form-control">
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ $customer->id == $transaction->customer_id ? 'selected' : '' }}>
                    {{ $customer->name }}
                </option>
            @endforeach
        </select>
        @error('customer_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- form grup for input delivery with selected delivery -->
<div class="form-group">
        <label for="delivery">Delivery</label>
        <select name="delivery_id" id="delivery" class="form-control">
            @foreach ($deliveries as $delivery)
                <option value="{{ $delivery->id }}" {{ $delivery->id == $transaction->delivery_id ? 'selected' : '' }}>{{ $delivery->driver }}</option>
            @endforeach
        </select>
        @error('delivery_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control" value="{{$transaction->date}}">
        @error('date')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="products">Products</label>
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
             aria-hidden="true">
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
        <div id="products-container">
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
                        <input type="hidden" name="products[{{ $product->id }}][product_id]" value="{{ $product->id }}">
                        <td><input type="number" name="products[{{ $product->id }}][quantity]" value="{{ $product->pivot->quantity }}" class="form-control"></td>
                        <td><input type="number" name="products[{{ $product->id }}][price]" value="{{ $product->pivot->price }}" class="form-control"></td>
                        <td><button type="button" class="btn btn-danger remove-product">Remove</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @error('products')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal">
        Add Product
    </button>
    </div>

    <!-- Include a submit button to submit the form -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



{{--<div class="form-group">--}}
{{--    <label>Products</label>--}}
{{--    <div id="products-container">--}}

{{--    </div>--}}
{{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal">--}}
{{--        Add Product--}}
{{--    </button>--}}
{{--</div>--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        // Fetch products for modal
        $('#productModal').on('show.bs.modal', function () {
            $.ajax({
                url: '/products', // Assuming a route that returns a list of products
                success: function(products) {
                    // Populate modal content with product options (e.g., a list)
                    var productList = '';
                    $.each(products, function(i, product) {
                        productList += '<li data-product-id="' + product.id + '">' + product.name + '</li>';
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
                '<input type="hidden" name="products[' + productId + '][product_id]" value="' + productId + '">' +
                '<input type="number" name="products[' + productId + '][quantity]" value="1" class="form-control">' +
                '<input type="number" name="products[' + productId + '][price]" class="form-control">' +
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
