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

use App\Http\Controllers\Backend\BlogController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
//pages route
Route::get('sports','HomeController@sports')->name('sports');
Route::get('politics','HomeController@politics')->name('politics');
Route::get('entertainment','HomeController@entertainment')->name('entertainment');
Route::get('international','HomeController@international')->name('international');
Route::get('technology','HomeController@technology')->name('technology');
Route::get('lifestyle', 'HomeController@lifestyle')->name('lifestyle');
Route::get('business','Homecontroller@business')->name('business');
Route::get('health','Homecontroller@health')->name('health');
Route::get('contact','HomeController@contact')->name('contact');
Route::get('about','HomeController@about')->name('about');
// These are the user routes that needs NO authentication
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
    Route::resource('/category','CategoryController');
    Route::resource('/all-pages','PageController');
    Route::resource('/blogs','BlogController');
    Route::resource('/news','NewsController');
    Route::get('/news/delete/{id}','NewsController@destroy');
    Route::get('/news/edit/{id}','NewsController@edit');
    Route::get('/news/show/{id}','NewsController@show');
    // Route::get('/add-news/update/{id}','NewsController@update');

});


