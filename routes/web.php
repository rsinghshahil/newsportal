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

// Route::get('/dash', function () {
//     return view('backend.index');
// });


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
// These are the user routes that needs NO authentications
Route::group(['namespace' => 'front'], function () {

});
// These are the user routes that needs authentications
Route::group(['namespace' => 'User','middleware' => 'auth'], function () {
    Route::get('/home','UserController@index')->name('index');
});





// These are the admin Register & Login Routes ...
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

// These are the dashboards routes
Route::group(['prefix' => 'admin', 'as' => '.admin', 'namespace' => 'backend', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard','DashboardController@index')->name('index');
    // Route::view('/admin', 'admin')->middleware('auth:admin');
    // Route::view('/dash', 'backend.index');
});

// Route::view('/home', 'home')->middleware('auth');


