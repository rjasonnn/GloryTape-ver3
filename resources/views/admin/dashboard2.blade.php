<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin Panel - Glory Tape</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy2BzxxJv6pEVR1RvuUmm4LvIj2IsXTEd" crossorigin="anonymous">
    </head>
<body class="d-flex flex-column min-vh-100">

<div class="h-[100vh]">
        <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="{{route('dashboard')}}">Glory Tape</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                                                        aria-controls="navbarNavDropdown"
                                                        aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                    @if (Route::has('register'))
                                        <li class="nav-item"><a class="nav-link"
                                                                                                                    href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                                                              href="#" role="button"
                                                                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>
                                        </li>
                                @endguest
                            </ul>
                    </nav>
            </header>


        <div class="container-fluid flex-grow-1">
                <div class="row">
                        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                                <div class="sidebar-sticky">
                                        <ul class="nav flex-column">
                                                <li class="nav-item">
                                                        <a class="nav-link active" href="#">
                                                                Sidebar Item 1
                                                            </a>
                                                    </li>
                                                <li class="nav-item">
                                                        <a class="nav-link" href="#">
                                                                Sidebar Item 2
                                                            </a>
                                                    </li>
                                                <li><a class="nav-link active" href="{{ route('bahans.index') }}">Bahans</a></li>
                                                <li><a class="nav-link" href="{{ route('catalogs.index') }}">Catalogs</a></li>
                                                <li><a class="nav-link" href="{{ route('customers.index') }}">Customers</a></li>
                                                <li><a class="nav-link" href="{{ route('deliveries.index') }}">Deliveries</a></li>
                                                <li><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                                                <li><a class="nav-link" href="{{ route('stores.index') }}">Stores</a></li>
                                                <li><a class="nav-link" href="{{ route('transactions.index') }}">Transactions</a></li>
                                                <li><a class="nav-link" href="{{ route('ukurans.index') }}">Ukurans</a></li>
                                                <li><a class="nav-link" href="{{ route('warnas.index') }}">Warnas</a></li>
                                                <!-- Add more sidebar items here -->
                                            </ul>
                                    </div>
                            </nav>
                        <nav class="col-md-2 side-navbar">
                                <ul>
                                        <li><a href="{{ route('catalogs.index') }}">Catalogs</a></li>
                                        <li><a href="{{ route('bahans.index') }}">Bahans</a></li>
                                        <li><a href="{{ route('ukurans.index') }}">Ukurans</a></li>
                                        <li><a href="{{ route('warnas.index') }}">Warnas</a></li>
                                        <li><a href="{{ route('products.index') }}">Products</a></li>
                                        <li><a href="{{ route('customers.index') }}">Customers</a></li>
                                        <li><a href="{{ route('deliveries.index') }}">Deliveries</a></li>
                                        <li><a href="{{ route('transactions.index') }}">Transactions</a></li>
                                        <li><a href="{{ route('stores.index') }}">Stores</a></li>
                                    </ul>
                            </nav>
                        <main class="col-md-10">
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                                <h1>Welcome to the Admin Panel</h1>
                                <p>Here you can manage your store's data.</p>
                                <br>
                            </main>
                    </div>
            </div>

        <!-- Footer at bottom -->
        <footer class="footer bg-light text-center text-lg-start">
                <div class="text-center p-3">
                        <p>©2021 Glory Tape. All rights reserved.</p>
                        <p>Created by <a href="https://www.glorytape.site">Glory Tape</a></p>
                    </div>
            </footer>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
