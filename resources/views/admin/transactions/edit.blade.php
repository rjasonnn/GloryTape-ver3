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
<div class="form-group">
    <label>Products</label>
    <div id="products-container">
        @foreach ($transaction->products as $product)
            <div class="product-item">
                <p>{{ $product->name }}</p>
                <input type="hidden" name="products[{{ $product->id }}][product_id]" value="{{ $product->id }}">
                <input type="number" name="products[{{ $product->id }}][quantity]" value="{{ $product->pivot->quantity }}" class="form-control">
                <input type="number" name="products[{{ $product->id }}][price]" value="{{ $product->pivot->price }}" class="form-control">
                <button type="button" class="btn btn-danger remove-product">Remove</button>
            </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal">
        Add Product
    </button>
</div>

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
