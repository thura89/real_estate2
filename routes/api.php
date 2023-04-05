<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('API')->group(function () {
    Route::get('/home', 'PageController@index');

    /* Slider */
    Route::get('/slider', 'SliderController@index');

    /* Region and Township */
    Route::get('/region', 'PageController@region');
    Route::get('/region/{id}/township', 'PageController@township');

    /* Common Const */
    Route::post('/common/const', 'PageController@const');

    /** Want To Buy Rent */
    Route::get('/want2buyrent', 'PageController@wantToBuyRent');
    Route::get('/want2buyrent/{id}/show', 'PageController@wantToBuyRentshow');

    /* Property */
    Route::get('/property-lists', 'PageController@property_list');
    Route::get('/recommend_property', 'PageController@recommend_property');
    Route::get('/hot_property', 'PageController@hot_property');
    Route::get('/property/{id}/show', 'PageController@show');

    /* New Project */
    Route::get('/new-projects', 'NewProjectController@new_project');
    Route::get('/new-project/{id}/show', 'NewProjectController@show');

    /* News */
    Route::get('/news-lists', 'NewsController@news');
    Route::get('/news/{id}/show', 'NewsController@news_detail');

    /* User By Agent */
    Route::get('/agent-lists', 'AgentController@agentList');
    Route::get('/agent/{id}/properties', 'AgentController@agentProperties');

    /* User By Developer */
    Route::get('/developer-lists', 'DeveloperController@developerList');
    Route::get('/developer/{id}/properties', 'DeveloperController@developerProperties');

    Route::post('/social/register', 'AuthController@register');
    Route::post('/social/login', 'AuthController@loginWithSocial');
    Route::post('/mobile-register/verify', 'AuthController@mobile_register');
    Route::post('/mobile-register/check_code', 'AuthController@check_code');
    Route::post('/mobile-register/resend_code', 'AuthController@resend_code');
    Route::post('/mobile-register/fullinfo', 'AuthController@mobileRegisterFullInfo');
    Route::post('/mobile/forgetpassword_send_code', 'AuthController@forgetPassword_send_code');
    Route::post('/mobile-register/resetpassword', 'AuthController@resetPassword');


    Route::post('/login', 'AuthController@login');

    Route::middleware('auth:api')->group(function () {
        Route::get('/profile', 'ProfileController@profile');
        Route::post('/profile', 'ProfileController@update_profile');
        /* Profile Update - Delete Image */
        Route::post('/profile/delete_company_image', 'ProfileController@DeleteCompanyImage');

        Route::post('/logout', 'AuthController@logout');
        Route::post('/change-password', 'AuthController@changePassword');

        /* Property List */
        Route::get('/user/property', 'PropertyController@property_list');
        Route::get('/user/property/{id}/show', 'PropertyController@show');
        Route::get('/user/property/{id}/delete', 'PropertyController@destroy');

        /* Expired Property List */
        Route::get('/user/expired_property', 'ExpiredPropertyController@property_list');
        Route::get('/user/expired_property/{id}/show', 'ExpiredPropertyController@show');
        Route::get('/user/expired_property/{id}/renew', 'ExpiredPropertyController@renew');
        Route::get('/user/expired_property/{id}/delete', 'ExpiredPropertyController@destroy');

        /* Want To Buy & Rent */
        Route::get('/user/want2buyrent', 'Want2BuyRentController@index');
        Route::get('/user/want2buyrent/{id}/show', 'Want2BuyRentController@show');
        Route::post('/user/want2buyrent/create', 'Want2BuyRentController@store');
        Route::post('/user/want2buyrent/{id}/update', 'Want2BuyRentController@update');
        Route::post('/user/want2buyrent/{id}/delete', 'Want2BuyRentController@destroy');
        Route::get('/user/want2buyrent/{id}/renew', 'Want2BuyRentController@renew');


        Route::middleware('api_is_developer')->group(function () {
            /* New Project */
            Route::get('/user/newproject', 'UserNewProjectController@index');
            Route::post('/user/newproject/create', 'UserNewProjectController@store');
            Route::get('/user/newproject/{id}/show', 'UserNewProjectController@show');
            Route::post('/user/newproject/delete_images', 'UserNewProjectController@DeleteNewProjectImage');
            Route::post('/user/newproject/{id}/update', 'UserNewProjectController@update');
            Route::post('/user/newproject/{id}/delete', 'UserNewProjectController@destroy');
        });

        /* Property Create - Update */
        Route::post('user/property/delete_image', 'PropertyController@DeletePropertyImage');

        /* House  */
        Route::post('user/property/create/house_shop', 'PropertyController@house_shop_create');
        Route::post('user/property/update/house_shop', 'PropertyController@house_shop_update');

        /* LandHouse */
        Route::post('user/property/create/land_house_land', 'PropertyController@land_house_land_create');
        Route::post('user/property/update/land_house_land', 'PropertyController@land_house_land_update');

        /* ApartmentAndCondo */
        Route::post('user/property/create/apart_condo_office', 'PropertyController@apart_condo_office_create');
        Route::post('user/property/update/apart_condo_office', 'PropertyController@apart_condo_office_update');

        /* WishList */
        Route::resource('/wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);

        /* User Follower */
        Route::post("follow", 'FollowController@follow');
        Route::post("unfollow", 'FollowController@unfollow');
        Route::get("myfollowers", 'FollowController@myFollowerList');
    });
});
