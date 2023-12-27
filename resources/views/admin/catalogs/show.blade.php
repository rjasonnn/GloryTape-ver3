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
<h1>{{ $catalog->description }}</h1>

<img src="{{ asset($catalog->image_path) }}" alt="{{ $catalog->description }}" style="width: 200px;">

<p>Start Date: {{ $catalog->start_date }}</p>
<p>End Date: {{ $catalog->end_date }}</p>

<a href="{{ route('catalogs.index') }}" class="btn btn-primary">Back to Catalogs</a>

</body>
</html>
