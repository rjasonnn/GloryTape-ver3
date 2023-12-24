<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Carousel</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div id="imageCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        // Fetch images and descriptions from the catalog table in the database
        $images = \App\Models\Catalog::all();
        $first = true; // To mark the first image as active

        foreach ($images as $image) {
            // Use the image_path and description fields from the database
            $imagePath = $image->image_path;
            $description = $image->description;

            // Set the active class for the first image
            $activeClass = $first ? 'active' : '';

            // Output the carousel item with image and description
            echo "<div class='carousel-item $activeClass'>
                    <img src='storage/{$imagePath}' class='d-block w-100' alt='$description'>
                    <div class='carousel-caption d-none d-md-block'>
                        <p>$description</p>
                    </div>
                </div>";

            $first = false; // After the first iteration, set $first to false
        }
        ?>
    </div>
    <!-- Add carousel controls -->
    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

{{--add div for about us--}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>About Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, alias asperiores atque autem
                blanditiis commodi consequatur cumque cupiditate delectus doloremque doloribus ducimus ea earum
                eligendi eos error est eum eveniet excepturi exercitationem facilis fugiat fugit hic illum impedit
                incidunt ipsa ipsum iure laboriosam laborum libero magnam magni maiores maxime minima minus modi
                molestiae mollitia natus nemo neque nihil nisi nobis nostrum nulla numquam obcaecati officia officiis
                omnis optio pariatur perferendis perspiciatis placeat porro possimus praesentium provident quae quas
                quasi quia quibusdam quisquam quod quos ratione recusandae rem repellat repellendus reprehenderit
                repudiandae rerum saepe sapiente sequi similique sint sit soluta sunt suscipit tempora temporibus
                tenetur totam ullam unde ut vel veniam veritatis voluptas voluptate voluptatem voluptates voluptatum
                voluptatibus. Accusamus accusantium adipisci alias aliquam aliquid amet animi aperiam architecto
                asperiores aspernatur assumenda at atque aut autem beatae blanditiis consequatur consequuntur culpa
                cum cumque cupiditate delectus deleniti deserunt dicta dignissimos distinctio dolor dolorem doloremque
                dolores doloribus dolorum ducimus ea eius eligendi eos error esse est et eum eveniet excepturi
                exercitationem expedita explicabo facere facilis fugiat fugit harum hic id illum impedit in incidunt
                ipsa ipsum iste itaque iure labore laboriosam laborum laudantium libero magnam magni maiores maxime
                molestiae molestias mollitia nam natus necessitatibus nemo neque nihil nisi nobis non nostrum nulla
                numquam obcaecati odit officia officiis omnis optio pariatur perferendis perspiciatis
                placeat praesentium provident quae quas quasi qui quia quibusdam quidem quisquam quo ratione
                .
            </p>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and Popper.js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
