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

Route::get('/destination', 'TourController')->name('destination.index');

Route::get('/blog', 'BlogController@index')->name('blog.index');

Route::get('/blog/{id}', 'BlogController@show')->name('blog.detail');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact.index');

Route::get('/about', function () {
    return view('about.index');
})->name('about.index');

Route::get('/hotel', function () {
    return view('hotel.index');
})->name('hotel.index');

Route::get('/greeting/{locale}', function ($locale) {
    \Session::put('website_language', $locale);
    return redirect()->back();
})->name('change-language');
// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/{any}', function () {
//         return view('admin.index');
//     })->where('any', '.*');;
// });

Route::post('image-upload', 'ImageController@upload')->name('upload');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');

    Route::post('prefectures', 'PrefectureController@index');

    Route::middleware(['auth.admin'])->group(function () {
        Route::post('/logout', 'AuthController@logout')->name('logout');
        Route::get('/', function () {
            return view('admin.index');
        })->name('home');

        Route::group(['prefix' => 'blogs'], function () {
            Route::get('/', 'BlogController@index')->name('blog.index');
            Route::get('create', 'BlogController@create')->name('blog.create');
            Route::post('create', 'BlogController@store');
            Route::get('/{id}', 'BlogController@edit')->name('blog.edit');
            Route::post('/{id}', 'BlogController@update');
        });

        Route::group(['prefix' => 'tours'], function () {
            Route::get('/', 'TourController@index')->name('tour.index');
            Route::get('create', 'TourController@create')->name('tour.create');
            Route::post('create', 'TourController@store');
            Route::get('/{id}/detail', 'TourController@detail')->name('tour.detail');
            Route::get('/{id}', 'TourController@edit')->name('tour.edit');
            Route::post('/{id}', 'TourController@update');
        });
    });
});