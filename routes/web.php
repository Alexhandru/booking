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

Route::get('/home', function () {
    return view('home');
});


/////  ROOMS ROUTES  /////

// Route::resource('/rooms/info/{idloc}', 'RoomController');
//Route::resource('/rooms/review/{id}', 'ReviewController');
//Route::resource('/rooms', 'RoomController');
Route::get('/rooms/review/{id}','Controller@showroom');
Route::get('/rooms/{loc}/{beds}','Controller@showbyloc');


/////  LOCATION ROUTES  /////

Route::post('location_fetch', [
    'uses' => 'LocationController@fetch'
  ]);

Route::post('/post-data', 'LocationController@fetch')->name('postData');


/////  ADMIN DASHBOARD ROUTES  /////
/*
    Pt fiecare functionalitate din dashboard sa fie cate o ruta dinasta.
    Se pastreaza prefixul 'dashboard'
        ->   Route::get('/dashboard/FUNCTIONALITY-NAME', 'AdminPageController@FUNCTIONALITY');

    Fiecare View aferent functionalitatii sa dea extend la admdboard.blade.php din layouts pt uniformitate.    
        ->   @section('admin-content')
                    functionality code here
             @endsection
    
    In cazul in care e nevoie de variabile in blade, se trimit din Controller in urma unei rute spre functia respectiva
        ->   return view('VIEW-NAME')->with('VAR-NAME', $LOCAL-VAR-NAME);
    Note: vezi User 'bookings' route
*/
Route::get('/dashboard/main', 'AdminPageController@ViewDashboard');
Route::get('/dashboard/users', 'AdminPageController@ViewUsers');


/////  USER PAGE ROUTES  /////

Route::get('bookings', 'UserController@showUserBookings')->name('bookings');


Auth::routes();
