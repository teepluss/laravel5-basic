<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['namespace' => 'Demo', 'prefix' => 'demo'], function()
{
    Route::controllers([
        'bus'        => 'BusController',
        'users'      => 'UsersController',
        'theme'      => 'ThemeController',
        'upload'     => 'UploadController',
        'provider'   => 'ProviderController',
        'components' => 'ComponentsController',
        'decoration' => 'DecorationController'
    ]);

});

Route::group(['namespace' => 'Api', 'prefix' => 'api/v1'], function()
{
    Route::resources([
        '/users'      => 'UsersController',
        '/photos'     => 'PhotosController',
        '/categories' => 'CategoriesController',
        '/'           => 'ExampleController',
    ]);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'acl']], function()
{
    Route::get('/', [
        'uses'       => 'DashboardController@getIndex',
        'as'         => 'get.dashboard.index',
        'permission' => ['admin.dashboard.view']
    ]);
});

