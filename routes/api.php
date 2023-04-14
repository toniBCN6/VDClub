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


	Route::get('catalog/secret', function(){
		if(authenticated()){
		return Response::json(['content' => 'secret page']);
		}
		else{
		return Response::json(['content' => 'no estas autorizado'], 401);
		}
	});

	Route::get('catalog' , 'APICatalogController@index');

	Route::get('catalog/{id}' , 'APICatalogController@show');

	Route::post('catalog' , 'APICatalogController@store')->middleware('auth.basic.once');

	Route::put('catalog{id}', 'APICatalogController@update')->middleware('auth.basic.once');

	Route::delete('catalog/{id}','APICatalogController@destroy')->middleware('auth.basic.once');

	Route::put('catalog/{id}/rent','APICatalogController@putRent')->middleware('auth.basic.once');

	Route::put('catalog/{id}/return','APICatalogController@putReturn')->middleware('auth.basic.once');

