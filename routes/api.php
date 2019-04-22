<?php

use Illuminate\Http\Request;

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

// Folder : User
Route::group(['namespace' => 'User'], function () {

    // Folder : Auth
    Route::group(['namespace' => 'Auth'], function () {

        Route::group(['prefix' => 'auth'], function () {

            Route::post('login', 'LoginController@authenticate');
            Route::post('register', 'RegisterController@register');

            Route::group(['middleware' => ['jwt.verify']], function () {
                // Is user still log
                Route::any('/authentified', 'LoginController@getAuthenticatedUser');
                Route::get('logout', 'LogoutController@logout');
            });
        });

    });
    

    Route::group(['middleware' => ['jwt.verify']], function () {
        // Folder Post
        Route::group(['namespace' => 'Post'], function () {
            Route::group(['prefix' => 'posts'], function () {
                Route::post('/', 'PostController@show');
                Route::post('create', 'PostController@create');
            });
        });

        // Route::group(['prefix' => 'affinities'], function () {
        //     Route::post('/', 'AffinityController@get');
        //     Route::post('create', 'PostController@create');
        // });

        Route::group(['prefix' => 'edit'], function () {
            Route::post('/', 'UserController@edit');
            Route::post('password', 'UserController@editPassword');
        });
    });

    

});
