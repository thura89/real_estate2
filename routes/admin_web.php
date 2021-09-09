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

    Route::resource('/admin-user', 'AdminUserController');
    Route::get('/admin-user/datatables/ssd', 'AdminUserController@ssd');

    Route::resource('/agent-user', 'AgentUserController');
    Route::get('/agent-user/datatables/ssd', 'AgentUserController@ssd');
});


