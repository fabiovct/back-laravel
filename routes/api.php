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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();
//});

//Route::post('/login', 'LoginController@login');


Route::middleware('auth:api')->get('/user' ,function (Request $request) {

    return $request->user();
//Route::middleware('scopes:user')->get('me', 'Auth\AuthController@details');


});

Route::prefix('auth')->group(function(){
    Route::post('register', 'AuthenticatorController@register');
    Route::post('login', 'AuthenticatorController@login');


    Route::middleware('auth:api')->group(function(){
        Route::post('logout', 'AuthenticatorController@logout');
        //Route::get('/list', 'HomeController@listAll');
    });
});

Route::get('/list', 'HomeController@listAll');

Route::get('products', 'ProductsController@index')
    ->middleware('auth:api')
    ;



//Route::get('/list', 'HomeController@listAll')
//->middleware('auth:api');;


//Route::get('/a', function(){
    //return 'API';
//});


