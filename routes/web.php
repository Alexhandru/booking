<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::resource('/rooms/info/{idloc}', 'RoomController');
//Route::resource('/rooms/review/{id}', 'ReviewController');
//Route::resource('/rooms', 'RoomController');
Route::get('/rooms/review/{id}','Controller@showroom');
Route::get('/rooms/{loc}/{beds}','Controller@showbyloc');


Route::post('location_fetch', [
    'uses' => 'LocationController@fetch'
  ]);

Route::post('/post-data', 'LocationController@fetch')->name('postData');


Route::get('/home', function () {
    return view('home');
});
/*
Route::get('bookings', function(){
    return view('userpage');
})->name('bookings');
*/
Route::get('bookings', 'UserController@showUserBookings')->name('bookings');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
/*
Route::get('/login', function(){
    return view('auth.login');
});
*/
//Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@authenticated']);
//Route::post('register', [ 'as' => 'register', 'uses' => 'Auth\RegisterController@::dispatchNow()']);
