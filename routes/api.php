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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/verified-only', function(Request $request){
    dd('your are verified', $request->user()->name);
})->middleware('auth:api','verified');

Route::apiResource('/items', 'Api\ItemController')->only(['index', 'show', 'store']);

Route::apiResource('/set', 'Api\SetController')->middleware('auth:api');

Route::post('/register', 'Api\Auth\AuthController@register');
Route::post('/login', 'Api\Auth\AuthController@login');
// Route::post('/login', ['as' =>'login', 'users' => 'Api\Auth\AuthController@login']);

Route::post('/password/email', 'Api\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Api\Auth\ResetPasswordController@reset');

Route::get('/email/resend', 'Api\Auth\VerificationController@resend')->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', 'Api\Auth\VerificationController@verify')->name('verification.verify');




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