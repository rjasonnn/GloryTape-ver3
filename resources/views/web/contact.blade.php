@extends('layouts.header')

@section('layout_contect')

    <!-- Main Content -->
    <div class="container mt-4">

        <h1>Contact Us</h1>
        
        <div class="container mt-4 py-5">
            <table class="table border-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Region</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contact = \App\Models\Store::all();
                    foreach ($contact as $c) {
            // Use the image_path and description fields from the database
            $name = $c->name;
            $region = $c->region;
            $phone = $c->phone;
                    ?>
                    <tr>
                        <td class="px-4 py-2">{{ $name }}</td>
                        <td class="px-4 py-2">{{ $region }}</td>
                        <td class="px-4 py-2">{{ $phone }}</td>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
@endsection
