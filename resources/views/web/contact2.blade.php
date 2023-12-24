<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <?php
    // Fetch images and descriptions from the catalog table in the database
    $contact = \App\Models\Store::all();


    foreach ($contact as $c) {
        // Use the image_path and description fields from the database
        $name = $c->name;
        $region = $c->region;
        $phone = $c->phone;
        ?>

        <table>
            <tr>
                <td>Name</td>
                <td>Region</td>
                <td>Phone</td>
            </tr>
            <tr>
                <td>{{$name}}</td>
                <td>{{$region}}</td>
                <td>{{$phone}}</td>
            </tr>
        </table>


        <?php
    }
    ?>


</div>

<!-- Add Bootstrap JS and Popper.js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
