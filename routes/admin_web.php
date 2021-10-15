<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('admin')->name('admin.')->namespace('Backend')->middleware('auth:admin_user')->group(function () {
    Route::get('/', 'PageController@index')->name('dashboard');  

    /* Admin Profile */
    Route::get('profile', 'AdminUserController@profile')->name('profile');
    Route::post('profile/{id}', 'AdminUserController@profile_update')->name('profile.update');

    Route::resource('/admin-user', 'AdminUserController');
    Route::get('/admin-user/datatables/ssd', 'AdminUserController@ssd');

    Route::resource('/agent-user', 'AgentUserController');
    Route::get('/agent-user/datatables/ssd', 'AgentUserController@ssd');

    Route::resource('/property', 'PropertyController');
    Route::get('/property/datatables/ssd', 'PropertyController@ssd');

    /* Want To Buy & Rent */
    Route::resource('/want2buyrent', 'Want2BuyRentController');
    Route::get('/want2buyrent/datatables/ssd', 'Want2BuyRentController@ssd');

    /* News */
    Route::resource('/news', 'NewsController');
    Route::get('/news/datatables/ssd', 'NewsController@ssd');

    /* House  */
    Route::post('/property/create/house_shop' , 'PropertyController@house_shop_create')->name('property.create.house_shop');
    Route::post('/property/update/house_shop' , 'PropertyController@house_shop_update')->name('property.update.house_shop');

    /* LandHouse */
    Route::post('/property/create/land_house_land' , 'PropertyController@land_house_land_create')->name('property.create.landhouse_land');
    Route::post('/property/update/land_house_land' , 'PropertyController@land_house_land_update')->name('property.update.landhouse_land');

    /* ApartmentAndCondo */
    Route::post('/property/create/apart_condo_office' , 'PropertyController@apart_condo_office_create')->name('property.create.apartcondo_office');
    Route::post('/property/update/apart_condo_office' , 'PropertyController@apart_condo_office_update')->name('property.update.apartcondo_office');

    /* Get Region and Township */
    Route::get('/region' , 'PropertyController@region')->name('region');
    Route::post('/township' , 'PropertyController@township')->name('township');

    Route::post('/property/create/form');
});


