<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout',['uses' => 'AdminAuth\AuthController@logout', 'as' => 'admin.logout']);

    // Registration Routes...
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');

    Route::get('/admin', ['uses' => 'Admin\AdminHomeController@index', 'as' => 'admin_dashboard']);

    Route::group(['prefix'=>'department'], function() {
        Route::get('/create', [
            'as' => 'department.create',
            'uses' => 'DepartmentsController@create'
        ]);

        Route::get('/list-all', [
            'as' => 'department.index',
            'uses' => 'DepartmentsController@index'
        ]);
        
        Route::post('/store', [
            'as' => 'department.store',
            'uses' => 'DepartmentsController@store'
        ]);
    });

    Route::group(['prefix'=>'user'], function() {
        Route::get('/create', [
            'as' => 'user.create',
            'uses' => 'UsersController@create'
        ]);

        Route::get('/list-all', [
            'as' => 'user.index',
            'uses' => 'UsersController@index'
        ]);
        
        Route::post('/store', [
            'as' => 'user.store',
            'uses' => 'UsersController@store'
        ]);
    });

    Route::group(['prefix'=>'tender'], function() {
        Route::get('/create', [
            'as' => 'tender.create',
            'middleware' => ['auth'],
            'uses' => 'TendersController@create'
        ]);
    });

});  

Route::group(['prefix'=>'admin'], function() {
    Route::group(['prefix'=>'order'], function() {
        Route::get('/create', [
            'as' => 'admin.order.create',
            'middleware' => ['admin'],
            'uses' => 'OrdersController@adminCreate'
        ]);

        Route::post('/store', [
            'as' => 'admin.order.store',
            'middleware' => 'admin',
            'uses' => 'OrdersController@admin_store'
        ]);

        Route::get('/view-all', [
            'as' => 'admin.order.index',
            'middleware' => 'admin',
            'uses' => 'OrdersController@index'
        ]);
    });

});

Route::get('/', [
    'as' => 'appointment.create',
    'uses' => 'HomeController@index'
]);



Route::auth();

Route::get('/home', 'HomeController@index');
