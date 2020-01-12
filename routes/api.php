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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::apiResource('/items', 'Api\ItemController')->only(['index', 'show', 'store']);
Route::apiResource('/available-items', 'Api\AvailableItemController');

Route::post('/register', 'Api\Auth\AuthController@register');
Route::post('/login', 'Api\Auth\AuthController@login');
Route::post('/password/email', 'Api\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Api\Auth\ForgotPasswordController@reset');

/* Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

}); */

// Route::post('/auth/login', 'Api\Auth\LoginController@login');