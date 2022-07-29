<?php

use Illuminate\Support\Facades\Auth;
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

/* User */
Auth::routes();

// /* Authentication Routes... */

// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

// Route::post('login', 'Auth\LoginController@login');

// Route::post('logout', 'Auth\LoginController@logout')->name('logout');



// /* Registration Routes... */

// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

// Route::post('register', 'Auth\RegisterController@register');



// /* Password Reset Routes... */

// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



/* Email Verification Routes... */

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');

Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/', 'CommonAuthController@showLoginForm');
Route::get('/test_route', 'StagingController@test_route');

/* Social Lite */
Route::get('auth/facebook', 'CommonAuthController@redirectToFacebook');
Route::get('auth/facebook/callback', 'CommonAuthController@facebookSignin');

Route::get('auth/google', 'CommonAuthController@redirectToGoogle');
Route::get('auth/google/callback', 'CommonAuthController@handleGoogleCallback');

/* Multi Auth with Single Page */
Route::get('/common/login', 'CommonAuthController@showLoginForm');
Route::post('/common/login', 'CommonAuthController@login')->name('common.login');

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

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
