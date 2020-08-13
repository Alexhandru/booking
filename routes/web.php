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
})->middleware('auth');


/////  ROOMS ROUTES  /////

// Route::resource('/rooms/info/{idloc}', 'RoomController');
//Route::resource('/rooms/review/{id}', 'ReviewController');
//Route::resource('/rooms', 'RoomController');
Route::get('/rooms/review/{id}','Controller@showroom');
Route::get('/rooms/{loc}/{beds}/{date}/{date2}','Controller@showbyloc');
//Route::get('/rooms/hrllo','Controller@insert');
Route::get('/reserved/{id}/{date}/{date2}/{iduser}','Controller@insert');

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
Route::get('/dashboard/location', 'AdminPageController@ViewLocations');
Route::get('/dashboard/location/{id}/edit', 'LocationController@edit');
Route::post('/{id}/update-Location', 'LocationController@update');
Route::get('dashboard/location/add', 'LocationController@create');
Route::post('/add-Location', 'LocationController@store');
Route::post('/dashboard/location/{locationID}/delete', 'LocationController@destroy');
Route::get('/dashboard/room', 'AdminPageController@ViewLocationsForRooms');
Route::get('/dashboard/room/{id}', 'AdminPageController@ViewRoomsForLocation');
Route::get('/dashboard/room/{id}/add', 'RoomController@create');
Route::post('/{id}/add-Room', 'RoomController@store');
Route::get('/dashboard/room/{id}/edit/{roomID}', 'RoomController@edit');
Route::post('/{locationID}/{roomID}/update-Room', 'RoomController@update');
Route::post('/{locationID}/{roomID}/delete-Room', 'RoomController@destroy');
Route::get('/dashboard/room/{locationID}/discount/{roomID}', 'DiscountsController@create');
Route::post('/{roomID}/{locationID}/set-Discount', 'DiscountsController@set');
Route::post('/{locationID}/{roomID}/delete-Discount', 'RoomController@deleteDiscount');
Route::get('/gallery/{roomID}', 'AdminPageController@ViewGalleryForRoom');
Route::get('/gallery/{roomID}/add-Photo', 'RoomController@createPhoto');
Route::post('/{roomID}/add-Photo', 'RoomController@storePhoto');
Route::post('/{roomID}/{photoID}/delete-Photo', 'RoomController@deletePhoto');
Route::get('/dashboard/company', 'AdminPageController@ViewCompanies');
Route::get('/dashboard/company/add', 'CompanyController@create');
Route::post('/add-Company', 'CompanyController@store');
Route::get('/dashboard/company/{companyID}/edit', 'CompanyController@edit');
Route::post('/{companyID}/update-Company', 'CompanyController@update');
Route::post('/{companyID}/delete-Company', 'CompanyController@destroy');
/////  USER PAGE ROUTES  /////

Route::get('bookings', 'UserController@showUserBookings')->name('bookings');

/////  AUTHENTICATION ROUTES  /////
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin','Auth\RegisterController@createAdmin');