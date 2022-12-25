<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
})->name('home.index');

Route::get('/destination', function () {
    return view('destination.index');
})->name('destination.index');

Route::get('/blog', function () {
    return view('blog.index');
})->name('blog.index');

Route::get('/blog/{id}', function () {
    return view('blog.detail');
})->name('blog.detail');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact.index');

Route::get('/about', function () {
    return view('about.index');
})->name('about.index');

Route::get('/hotel', function () {
    return view('hotel.index');
})->name('hotel.index');