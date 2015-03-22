<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['uses'=>'HomeController@index']);


Route::get('/candidates/{slug}/{prometer}', ['as' => 'category', 'uses' => 'CandidatesController@category']);
Route::get('/{slug}/{id}', ['as' => 'candidate', 'uses' => 'CandidatesController@show']);

Route::group(['before'=>'guest'], function(){

	Route::get('sign-up', ['as'=>'sign-up', 'uses'=>'UsersController@signUp']);
	Route::post('register', ['as'=>'register', 'uses'=>'UsersController@register']);
	Route::post('login', ['as'=>'login', 'uses'=>'AuthController@login']);
});


Route::group(['before'=>'auth'], function(){

	Route::get('account', ['as'=>'account', 'uses'=>'UsersController@account']);
	Route::get('account', ['as'=>'account', 'uses'=>'UsersController@account']);

	Route::get('profile', ['as'=>'profile', 'uses'=>'UsersController@profile']);
	Route::put('update-profile', ['as'=>'update-profile', 'uses'=>'UsersController@updateProfile']);	
	Route::get('logout', ['as'=>'logout', 'uses'=>'AuthController@logout']);
});
