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

Route::prefix('admin')->name('admin.')->namespace('Backend')->middleware('is_admin')->group(function () {
    Route::get('/', 'PageController@index')->name('dashboard');

    /** Admin Dashboard */
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    /* Admin Profile */
    Route::get('profile', 'AdminUserController@profile')->name('profile');
    Route::post('profile/{id}', 'AdminUserController@profile_update')->name('profile.update');

    Route::resource('/admin-user', 'AdminUserController');
    Route::get('/admin-user/datatables/ssd', 'AdminUserController@ssd');

    Route::resource('/agent-user', 'AgentUserController');
    Route::get('/agent-user/datatables/ssd', 'AgentUserController@ssd');

    Route::resource('/developer-user', 'DeveloperUserController');
    Route::get('/developer-user/datatables/ssd', 'DeveloperUserController@ssd');

    Route::resource('/dump-user', 'DumpUserController');
    Route::get('/dump-user/datatables/ssd', 'DumpUserController@ssd');

    Route::resource('/property', 'PropertyController');
    Route::get('/property/datatables/ssd', 'PropertyController@ssd');

    /* New Project */
    Route::resource('/new_project', 'NewProjectController');
    Route::get('/new_project/datatables/ssd', 'NewProjectController@ssd');
    Route::post('/new_project/renew/{id}', 'NewProjectController@expired')->name('newproject.expired');

    /* Want To Buy & Rent */
    Route::resource('/want2buyrent', 'Want2BuyRentController');
    Route::get('/want2buyrent/datatables/ssd', 'Want2BuyRentController@ssd');
    Route::post('/want2buyrent/renew/{id}', 'Want2BuyRentController@expired')->name('want2buyrent.expired');

    /* Expired Property */
    Route::resource('/expired_property', 'ExpiredPropertyController');
    Route::get('/expired_property/datatables/ssd', 'ExpiredPropertyController@ssd');
    Route::post('/expired_property/renew/{id}', 'ExpiredPropertyController@expired')->name('expired_property.expired');

    /* News */
    Route::resource('/news', 'NewsController');
    Route::get('/news/datatables/ssd', 'NewsController@ssd');

    /* News */
    Route::resource('/slider', 'SliderController');
    Route::get('/slider/datatables/ssd', 'SliderController@ssd');

    /* Property Create / Update  */
    Route::post('/property/create', 'PropertyController@PropertyCreate')->name('property.create');
    Route::post('/property/update', 'PropertyController@PropertyUpdate')->name('property.update');

    /* House  */
    Route::post('/property/create/house_shop', 'PropertyController@house_shop_create')->name('property.create.house_shop');
    Route::post('/property/update/house_shop', 'PropertyController@house_shop_update')->name('property.update.house_shop');

    /* LandHouse */
    Route::post('/property/create/land_house_land', 'PropertyController@land_house_land_create')->name('property.create.landhouse_land');
    Route::post('/property/update/land_house_land', 'PropertyController@land_house_land_update')->name('property.update.landhouse_land');

    /* ApartmentAndCondo */
    Route::post('/property/create/apart_condo_office', 'PropertyController@apart_condo_office_create')->name('property.create.apartcondo_office');
    Route::post('/property/update/apart_condo_office', 'PropertyController@apart_condo_office_update')->name('property.update.apartcondo_office');

    /* Get Region and Township */
    Route::get('/region', 'PropertyController@region')->name('region');
    Route::post('/township', 'PropertyController@township')->name('township');
});
