@extends('layouts.header')

@section('layout_contect')
    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <!-- Carousel on the left -->
            <div class="col-lg-6">
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
            </div>
            
            <!-- Box with "Contact Us" button on the right -->
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="bg-light p-4">
                    <h2>Contact Us</h2>
                    <p>Butuh Penawaran Harga, bantuan atau Konsultasi Produk?</p>
                    <button class="btn btn-primary">Contact Us</button>
                </div>
            </div>
        </div>
    </div>

<div class="container mt-4">
    <h1 class="text-center">Glory Tape</h1>
    <p class="text-center p-2">Kami mengkhususkan diri dalam produksi dan penjualan produk perekat diri, terutama Isolasi/ Lakban. Komitmen utama kami adalah untuk pengiriman produk dengan kualitas terbaik. Selain itu, untuk mempertahankan loyalitas pelanggan kami, kami selalu mengutamakan kepuasan pelanggan dengan memberikan pelayanan prima. Tujuan kami adalah untuk menyediakan produk-produk berkualitas tinggi dan jaminan kepuasan pelanggan.</p>
</div>

<div class="container mt-4">
    <h1 class="text-center">Produsen dan Pabrik Lakban Printing di Indonesia</h1>
    <p class="text-center p-2">Glory Tape telah berdiri sejak tahun 2015 sebagai Perusahaan Produsen & Pabrik Lakban Printing yang berlokasi di Surabaya Indonesia. Perusahaan kami mempunyai Visi dan Misi sebagai berikut :</p>

        <p class="text-center p-2">Visi: Menjadi Perusahaan yang solid dan terpercaya dibidang lakban printing di Indonesia.<br>Misi : Selalu berinovasi, untuk mencapai posisi terdepan dan dapat dipercaya, dengan orientasi yang konsisten terhadap kepuasan pelanggan.</p>
        
        <p class="text-center p-2">Glory Tape memproduksi Lakban Printing Murah yang sudah eksis dipasar lebih dari 5 tahun mendukung perusahan multi-nasional di bidang elektronik, otomotif, makanan & minuman, barang konsumen yang bergerak cepat dan banyak lagi. Kami sebagai Produsen & Pabrik Lakban Printing di Indonesia menghadirkan lakban printing dengan harga murah yang terjamin kualitasnya dan menawarkan harga yang bersaing serta kompetitif. Pada saat ini banyak perusahaan yang sudah memakai lakban printing karena memiliki fungsi sebagai perekat dalam pengepakan serta dapat mencantumkan logo dan nama perusahaan sehingga dapat diingat oleh konsumen serta sebagai alat promosi yang menguntungkan.</p>
</div>

<div class="container mt-4">
    <h1 class="text-center">Pabrik Isolasi di Surabaya</h1>
    <p class="text-center p-2">Glory Tape adalah Perusahaan Pabrik Isolasi yang berlokasi di Surabaya. Isolasi selotip adalah pita perekat atau lakban berbahan dasar karet yang biasa digunakan baik perorangan atau perusahaan. Pada dasarnya, isolasi berfungsi untuk mempermudah berbagai pekerjaan. Kegunaan utamanya adalah sebagai “penyatu” dan “perekat” benda-benda yang tadinya terpisah menjadi 1 bagian. Fungsi tersebut diterapkan ke kehidupan sehari-hari, sehingga dapat digunakan untuk keperluan seperti :
        <br>- Packaging barang
        <br>- Alat bantu mengecat
        <br>- Pelindung kabel listrik
        <br>- Memperbaiki barang yang rusak
        <br>- Memperbaiki kebocoran
        <br>- Menjilid buku
        <br>- dll
</div> 
@endsection
