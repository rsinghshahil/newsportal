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

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('sports','HomeController@sports')->name('sports');
Route::get("politics",'HomeController@politics')->name('politics');
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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'backend', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard','DashboardController@index')->name('index');
    // Route::view('/admin', 'admin')->middleware('auth:admin');
    // Route::view('/dash', 'backend.index');
    Route::resource('/add-category','CategoryController');
    Route::resource('/all-pages','PageController');
    Route::resource('/add-news','NewsController');
    Route::get('/add-news/delete/{id}','NewsController@destroy');
    Route::get('/add-news/edit/{id}','NewsController@edit');
    Route::get('/add-news/show/{id}','NewsController@show');
    // Route::get('/add-news/update/{id}','NewsController@update');
  
});


