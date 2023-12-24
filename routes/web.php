<?php

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
