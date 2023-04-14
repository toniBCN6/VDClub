<?php

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
Auth::routes();

Route::group(['middleware' => 'auth'], function() 
{
	
	Route::get('/catalog' , 'CatalogController@getIndex')->name('catalog.index');
	Route::get('/' , 'HomeController@getHome');
	Route::get('/home' , 'HomeController@getHome')->name('home');

	Route::get('/catalog/show/{id}' , 'CatalogController@getShow')->name('catalog.show');

	Route::get('/catalog/create' , 'CatalogController@getCreate');
	Route::post('/catalog/create', 'CatalogController@postCreate')->name('catalog.create')->middleware('admin');

	Route::get('/catalog/edit/{id}' , 'CatalogController@getEdit')->name('catalog.edit')->middleware('admin');
	Route::put('/catalog/edit/{id}', 'CatalogController@putEdit')->name('catalog.update')->middleware('admin');

	Route::put('/catalog/rent/{id}','CatalogController@putRent')->name('catalog.rent');

	Route::put('/catalog/return/{id}','CatalogController@putReturn')->name('catalog.return');

	Route::delete('/catalog/delete/{id}','CatalogController@deleteMovie')->name('catalog.delete')->middleware('admin');

	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');

});

