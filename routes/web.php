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

Route::get('/', 'Auth\AdminLoginController@showLoginForm');

/* User */
Auth::routes();

/* Admin */
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

/* Agent */
Route::get('/agent', 'Auth\AgentLoginController@showLoginForm');
Route::get('/agent/login', 'Auth\AgentLoginController@showLoginForm');
Route::post('/agent/login', 'Auth\AgentLoginController@login')->name('agent.login');
Route::post('/agent/logout', 'Auth\AgentLoginController@logout')->name('agent.logout');

/* Developer */
Route::get('/developer', 'Auth\DeveloperLoginController@showLoginForm');
Route::get('/developer/login', 'Auth\DeveloperLoginController@showLoginForm');
Route::post('/developer/login', 'Auth\DeveloperLoginController@login')->name('developer.login');
Route::post('/developer/logout', 'Auth\DeveloperLoginController@logout')->name('developer.logout');
