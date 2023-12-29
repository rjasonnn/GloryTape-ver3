<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<!-- Wrap your content in a form tag -->
<form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
        <input type="file" name="invoice" id="invoice" accept=".jpg, .jpeg, .png, .pdf" class="form-control">
        @error('invoice')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <div class="form-group">
        <label for="customer">Customer</label>
        <select name="customer_id" id="customer" class="form-control">
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
        @error('customer_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="delivery">Delivery</label>
        <select name="delivery_id" id="delivery" class="form-control">
            @foreach ($deliveries as $delivery)
                <option value="{{ $delivery->id }}">{{ $delivery->driver }}</option>
            @endforeach
        </select>
        @error('delivery_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control">
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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function () {
        // Fetch products for modal
        $('#productModal').on('show.bs.modal', function () {
            $.ajax({
                url: '/api/products', // Make sure to include the correct path to your route
                success: function (products) {
                    console.log(products);
                    // Populate modal content with product options (e.g., a list)
                    let productList = '';
                    $.each(products, function (i, product) {
                        // productList += '<li data-product-id="' + product.id + '">' + product.name + '</li>';
                        productList += '<a data-product-id="' + product.id + '">' + product.name + '</a><br>';
                    });
                    // $('#productModal .modal-body').html('<ul>' + productList + '</ul>');
                    $('#productModal .modal-body').html('<div>' + productList + '</div>');
                }
            });
        });

        // Handle product selection
        $('#productModal div').on('click', 'a', function (event) {
            event.preventDefault(); // Add this line to prevent default form submission
            const productId = $(this).data('product-id');
            const productName = $(this).text();

            // Check if product is already in the list
            const existingProduct = $('#products-container table tbody').find('.product-item[data-product-id="' + productId + '"]');
            if (existingProduct.length) {
                // alert('This product is already in the list.');
                return;
            }

            // Create product item element
            const productItem = $('' +
                '<tr class="product-item" data-product-id="' + productId + '">' +
                '<td>' + productName + '</td>' +
                '<input type="hidden" name="products[' + productId + '][product_id]" value=' + productId + '>' +
                '<td><input type="number" name="products[' + productId + '][quantity]" value="1" class="form-control"></td>' +
                '<td><input type="number" name="products[' + productId + '][price]" class="form-control"></td>' +
                '<td><button type="button" class="btn btn-danger remove-product">Remove</button></td>' +
                '</tr>');

            // Append to products container
            $('#products-container table tbody').append(productItem);

            // Close modal
            $('#productModal').modal('hide');
        });

// Handle product removal
        $('#products-container').on('click', '.remove-product', function () {
            $(this).closest('.product-item').remove();
        });
    });
</script>
</body>
</html>
