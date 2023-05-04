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

Route::prefix('developer')->name('developer.')->namespace('Backend\Developer')->middleware('is_developer')->group(function () {
    Route::get('/', 'DeveloperPageController@index')->name('dashboard');

    Route::resource('/property', 'PropertyController');
    Route::get('/property/datatables/ssd', 'PropertyController@ssd');

    /* Want To Buy & Rent */
    Route::resource('/want2buyrent', 'Want2BuyRentController');
    Route::get('/want2buyrent/datatables/ssd', 'Want2BuyRentController@ssd');
    Route::post('/want2buyrent/renew/{id}', 'Want2BuyRentController@expired')->name('developer.want2buyrent.expired');

    /* Expired Property */
    Route::resource('/expired_property', 'ExpiredPropertyController');
    Route::get('/expired_property/datatables/ssd', 'ExpiredPropertyController@ssd');
    Route::post('/expired_property/renew/{id}', 'ExpiredPropertyController@expired')->name('developer.expired_property.expired');

    /* New Project */
    Route::resource('/new_project', 'NewProjectController');
    Route::get('/new_project/datatables/ssd', 'NewProjectController@ssd');
    Route::post('/new_project/renew/{id}', 'NewProjectController@expired');

    /* Agent Profile */
    Route::get('profile', 'DeveloperPageController@profile')->name('profile');
    Route::post('profile/{id}', 'DeveloperPageController@profile_update')->name('profile.update');

    /* Property Create / Update  */
    Route::post('/property/create', 'PropertyController@PropertyCreate')->name('property.create');
    Route::post('/property/update', 'PropertyController@PropertyUpdate')->name('property.update');

    // House 
    Route::post('/property/create/house_shop', 'PropertyController@house_shop_create')->name('property.create.house_shop');
    Route::post('/property/update/house_shop', 'PropertyController@house_shop_update')->name('property.update.house_shop');

    // LandHouse
    Route::post('/property/create/land_house_land', 'PropertyController@land_house_land_create')->name('property.create.landhouse_land');
    Route::post('/property/update/land_house_land', 'PropertyController@land_house_land_update')->name('property.update.landhouse_land');

    // ApartmentAndCondo
    Route::post('/property/create/apart_condo_office', 'PropertyController@apart_condo_office_create')->name('property.create.apartcondo_office');
    Route::post('/property/update/apart_condo_office', 'PropertyController@apart_condo_office_update')->name('property.update.apartcondo_office');

    Route::get('/region', 'PropertyController@region')->name('region');
    Route::post('/township', 'PropertyController@township')->name('township');
});
