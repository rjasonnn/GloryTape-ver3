<?php

use App\Http\Controllers\BahanController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\WarnaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('web.home');
})->name('home');

//Route::get('/about-us', function () {
//    return view('about');
//})->name('about');

Route::get('/contact-us', function () {
    return view('web.contact');
})->name('contact');

//Route::get('/catalog', function () {
//    return view('catalog');
//})->name('catalog');

//Route::get('/product/{id}', function () {
//    return view('product');
//})->name('product')->name('product');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// List all stores
Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');

// Create a new store
Route::get('/stores/create', [StoreController::class, 'create'])->name('stores.create');
Route::post('/stores', [StoreController::class, 'store'])->name('stores.store');

// Show a specific store
Route::get('/stores/{store}', [StoreController::class, 'show'])->name('stores.show');

// Edit a specific store
Route::get('/stores/{store}/edit', [StoreController::class, 'edit'])->name('stores.edit');
Route::put('/stores/{store}', [StoreController::class, 'update'])->name('stores.update');

// Delete a specific store
Route::delete('/stores/{store}', [StoreController::class, 'destroy'])->name('stores.destroy');



// List all catalogs
Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs.index');

// Create a new catalog
Route::get('/catalogs/create', [CatalogController::class, 'create'])->name('catalogs.create');
Route::post('/catalogs', [CatalogController::class, 'store'])->name('catalogs.store');

// Show a specific catalog
Route::get('/catalogs/{catalog}', [CatalogController::class, 'show'])->name('catalogs.show');

// Edit a specific catalog
Route::get('/catalogs/{catalog}/edit', [CatalogController::class, 'edit'])->name('catalogs.edit');
Route::put('/catalogs/{catalog}', [CatalogController::class, 'update'])->name('catalogs.update');

// Delete a specific catalog
Route::delete('/catalogs/{catalog}', [CatalogController::class, 'destroy'])->name('catalogs.destroy');



// List all bahans
Route::get('/bahans', [BahanController::class, 'index'])->name('bahans.index');

// Create a new bahan
Route::get('/bahans/create', [BahanController::class, 'create'])->name('bahans.create');
Route::post('/bahans', [BahanController::class, 'store'])->name('bahans.store');

// Show a specific bahan
Route::get('/bahans/{bahan}', [BahanController::class, 'show'])->name('bahans.show');

// Edit a specific bahan
Route::get('/bahans/{bahan}/edit', [BahanController::class, 'edit'])->name('bahans.edit');
Route::put('/bahans/{bahan}', [BahanController::class, 'update'])->name('bahans.update');

// Delete a specific bahan
Route::delete('/bahans/{bahan}', [BahanController::class, 'destroy'])->name('bahans.destroy');



// List all customers
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

// Create a new customer
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

// Show a specific customer
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');

// Edit a specific customer
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');

// Delete a specific customer
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');



// List all warnas
Route::get('/warnas', [WarnaController::class, 'index'])->name('warnas.index');

// Create a new warna
Route::get('/warnas/create', [WarnaController::class, 'create'])->name('warnas.create');
Route::post('/warnas', [WarnaController::class, 'store'])->name('warnas.store');

// Show a specific warna
Route::get('/warnas/{warna}', [WarnaController::class, 'show'])->name('warnas.show');

// Edit a specific warna
Route::get('/warnas/{warna}/edit', [WarnaController::class, 'edit'])->name('warnas.edit');
Route::put('/warnas/{warna}', [WarnaController::class, 'update'])->name('warnas.update');

// Delete a specific warna
Route::delete('/warnas/{warna}', [WarnaController::class, 'destroy'])->name('warnas.destroy');



// List all ukurans
Route::get('/ukurans', [UkuranController::class, 'index'])->name('ukurans.index');

// Create a new ukuran
Route::get('/ukurans/create', [UkuranController::class, 'create'])->name('ukurans.create');
Route::post('/ukurans', [UkuranController::class, 'store'])->name('ukurans.store');

// Show a specific ukuran
Route::get('/ukurans/{ukuran}', [UkuranController::class, 'show'])->name('ukurans.show');

// Edit a specific ukuran
Route::get('/ukurans/{ukuran}/edit', [UkuranController::class, 'edit'])->name('ukurans.edit');
Route::put('/ukurans/{ukuran}', [UkuranController::class, 'update'])->name('ukurans.update');

// Delete a specific ukuran
Route::delete('/ukurans/{ukuran}', [UkuranController::class, 'destroy'])->name('ukurans.destroy');



// List all deliveries
Route::get('/deliveries', [DeliveryController::class, 'index'])->name('deliveries.index');

// Create a new delivery
Route::get('/deliveries/create', [DeliveryController::class, 'create'])->name('deliveries.create');
Route::post('/deliveries', [DeliveryController::class, 'store'])->name('deliveries.store');

// Show a specific delivery
Route::get('/deliveries/{delivery}', [DeliveryController::class, 'show'])->name('deliveries.show');

// Edit a specific delivery
Route::get('/deliveries/{delivery}/edit', [DeliveryController::class, 'edit'])->name('deliveries.edit');
Route::put('/deliveries/{delivery}', [DeliveryController::class, 'update'])->name('deliveries.update');

// Delete a specific delivery
Route::delete('/deliveries/{delivery}', [DeliveryController::class, 'destroy'])->name('deliveries.destroy');



// List all products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Create a new product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Show a specific product
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Edit a specific product
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Delete a specific product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');



// List all transactions
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

// Create a new transaction
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

// Show a specific transaction
Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');

// Edit a specific transaction
Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');

// Delete a transaction
Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');


//Route::prefix('admin')->group(function () {
//    // Bahans routes (example)
//    Route::resource('bahans', BahanController::class);
//    // Catalogs routes (example)
//    Route::resource('catalogs', CatalogController::class);
//    // Customers routes (example)
//    Route::resource('customers', CustomerController::class);
//    // Deliveries routes (example)
//    Route::resource('deliveries', DeliveryController::class);
//    // Products routes (example)
//    Route::resource('products', ProductController::class);
//    // Stores routes (example)
//    Route::resource('stores', StoreController::class);
//    // Transactions routes (example)
//    Route::resource('transactions', TransactionController::class);
//    // Ukurans routes (example)
//    Route::resource('ukurans', UkuranController::class);
//    // Warnas routes (example)
//    Route::resource('warnas', WarnaController::class);
//});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/testModal', function () {
    return view('admin.catalogs.testModal');
});
