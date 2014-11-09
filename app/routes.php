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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/comingsoon', function()
{
    return View::make('others.comingsoon');
});

Route::get('/initialize', function()
{
    return View::make('others.showInitializeProgress');
});
//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');

// Confide alternate routes
Route::get( 'register',               'UsersController@create');
Route::post('register',               'UsersController@store');
Route::get( 'login',                  'UsersController@login');
Route::post('login',                  'UsersController@do_login');
Route::get( 'confirm/{code}',         'UsersController@confirm');
Route::get( 'forgot_password',        'UsersController@forgot_password');
Route::post('forgot_password',        'UsersController@do_forgot_password');
Route::get( 'reset_password/{token}', 'UsersController@reset_password');
Route::post('reset_password',         'UsersController@do_reset_password');
Route::get( 'logout',                 'UsersController@logout');

// Store manager routes
Route::resource('InitializeDBs', 'InitializeDBsController');
Route::resource('store_locations', 'StoreLocationsController');
Route::resource('taxes', 'TaxesController');
Route::get('taxes/store_tax/{store_id}', 'TaxesController@storeTax');
Route::resource('departments', 'DepartmentsController');
Route::get('department_list', 'DepartmentsController@departmentList');
Route::resource('dimensions', 'DimensionsController');
Route::resource('attributes', 'AttributesController');
Route::resource('items', 'ItemsController');
Route::get('var_items/{item_id}', array('as' => 'var_items', 'uses' => 'ItemsController@var_index'));

// Reports
Route::resource('dashboard', 'DashboardsController');