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

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/destination', 'TourController@index')->name('destination.index');
Route::get('/destination/{id}', 'TourController@show')->name('destination.detail');

Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{id}', 'BlogController@show')->name('blog.detail');

Route::post('/booking-tour', 'BookingController@bookingTour')->name('booking-tour.store');
Route::get('/booking-tour/{id}/confirm', 'BookingController@confirmBookingTour')->name('booking-tour-confirm');
Route::get('/booking-tour/{id}/edit', 'BookingController@editInfoBooking')->name('edit-booking-tour');
Route::post('/booking-tour/{id}/edit', 'BookingController@storeInfoBooking');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact.index');

Route::get('/about', function () {
    return view('about.index');
})->name('about.index');

// Route::get('/hotel', function () {
//     return view('hotel.index');
// })->name('hotel.index');

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
    Route::get('/password/send-mail', 'AuthController@formSendMailReset')->name('password.reset');
    Route::post('/password/send-mail', 'AuthController@sendMailReset');
    Route::get('/password/reset', 'AuthController@formResetPassword')->name('password.reset-pw');
    Route::post('/password/reset', 'AuthController@resetPassword');

    Route::post('prefectures', 'PrefectureController@index');

    Route::middleware(['auth.admin'])->group(function () {
        Route::get('/logout', 'AuthController@logout')->name('logout');
        Route::get('/', function () {
            return view('admin.index');
        })->name('home');

        Route::group(['prefix' => 'blogs'], function () {
            Route::get('/', 'BlogController@index')->name('blog.index');
            Route::get('create', 'BlogController@create')->name('blog.create');
            Route::post('create', 'BlogController@store');
            Route::get('/{id}', 'BlogController@edit')->name('blog.edit');
            Route::post('/{id}', 'BlogController@update')->name('blog.update');
        });

        Route::group(['prefix' => 'tours'], function () {
            Route::get('/', 'TourController@index')->name('tour.index');
            Route::get('create', 'TourController@create')->name('tour.create');
            Route::post('create', 'TourController@store');
            Route::get('/{id}', 'TourController@edit')->name('tour.edit');
            Route::post('/{id}', 'TourController@update');
        });

        Route::group(['prefix' => 'booking-tours'], function () {
            Route::get('/', 'BookingController@index')->name('booking.index');
            Route::get('/{id}/detail', 'BookingController@detail')->name('booking.detail');
            Route::post('/{id}/update-status-travel', 'BookingController@updateStatusTravel')->name('booking.update-status');
        });

        Route::group(['prefix' => 'manager'], function () {
            Route::get('/country', 'ManagerController@index')->name('manager.country.index');
            Route::get('country/create', 'ManagerController@createCountry')->name('manager.country.create-country');
            Route::post('country/create', 'ManagerController@storeCountry');
            Route::get('country/{id}/status/{status}', 'ManagerController@changeCountryStatus')->name('manager.country.change-country-status');

            Route::get('/traffic', 'ManagerController@trafficIndex')->name('manager.traffic.index');
        });

        Route::group(['prefix' => 'setting'], function () {
            Route::get('/', 'SettingController@index')->name('setting.index');
            Route::get('/change-password', 'SettingController@changePasswordForm')->name('setting.change-password');
            Route::post('/change-password', 'SettingController@changePassword');
            Route::get('/change-contact', 'SettingController@changeContactForm')->name('setting.change-contact');
            Route::post('/change-contact', 'SettingController@changeContact');
        });
    });
});