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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

//Route::get('/posts/{post}/addtheme', 'ThemesController@index');
Route::resource('themes', 'ThemesController');

Route::resource('customerbookings', 'CustomerbookingController');

Route::resource('customercustombookings', 'CustomercustombookingController');

Route::resource('bookings', 'BookingsController');

Route::resource('customthemes', 'CustomThemesController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::post('/index', 'IndexController@store');


Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::prefix('owner')->group(function()
{
    Route::get('/login', 'Auth\OwnerLoginController@ShowLoginForm')->name('owner.login');
    Route::post('/login', 'Auth\OwnerLoginController@login')->name('owner.login.submit');
    Route::get('/logout', 'Auth\OwnerLoginController@logout')->name('owner.logout');

    Route::get('/', 'OwnerController@index')->name('owner.dashboard');
    
});

Route::resource('posts', 'PostsController');


Auth::routes();

Route::get('verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::resource('messages', 'MessagesController');

//Route::post('messages', 'MessagesController@store2')->name('messages.store2');