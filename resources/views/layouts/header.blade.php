<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4f4f4f;">
        <a class="navbar-brand ps-1" href="/" style="color: #fff; font-weight: bold;">Glory Tape</a>
    <div class="container px-0">
       <a class="navbar-brand" href="../index.html"><img src="../assets/images/brand/logo/logo.svg" alt="" /></a>
       <div class="d-flex align-items-center order-lg-3 ms-lg-3">
          <div class="d-flex align-items-center">
             <div class="dropdown me-2">
             </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
       </div>
       <!-- Collapse -->
       <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/" style="color: #fff;">Home <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact-us" style="color: #fff;">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard" style="color: #fff;">Admin</a>
            </li>
        </ul>
    </div>
 </nav>

    <!-- Main Content -->
    <div class="container mt-4">
    @yield('layout_contect')
    </div>

    <footer class="text-light py-3" style="background-color: #4f4f4f;">
            <h3 class="m-4"style="color: #fff;">Glory Tape</h3>
            <p class="m-4"style="color: #fff;">Taman Pondok Indah, Wiyung, Kec. Wiyung, Surabaya, Jawa Timur 60228</p>
            <p class="m-4"style="color: #fff;">0811310383</p>
    </footer>
    <!-- Add Bootstrap JS and Popper.js links -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
