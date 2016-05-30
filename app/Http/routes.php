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

        Route::get('/view/{num}', [
            'as' => 'admin.order.view',
            'middleware' => 'admin',
            'uses' => 'OrdersController@view'
        ]);

        Route::get('/add-refund', [
            'as' => 'admin.order.add_refund',
            'middleware' => 'admin',
            'uses' => 'OrdersController@add_refund'
        ]);

        Route::post('/add-refund', [
            'as' => 'admin.order.post_refund',
            'middleware' => 'admin',
            'uses' => 'OrdersController@post_refund'
        ]);
    });

    Route::group(['prefix'=>'loading-info'], function() {
        Route::get('/create', [
            'as' => 'admin.loading.create',
            'middleware' => ['admin'],
            'uses' => 'LoadingInfosController@create'
        ]);

        Route::post('/store', [
            'as' => 'admin.loading.store',
            'middleware' => 'admin',
            'uses' => 'LoadingInfosController@store'
        ]);

        Route::get('/view-all', [
            'as' => 'admin.loading.index',
            'middleware' => 'admin',
            'uses' => 'LoadingInfosController@index'
        ]);

        Route::get('/view/{num}', [
            'as' => 'admin.loading.view',
            'middleware' => 'admin',
            'uses' => 'LoadingInfosController@view'
        ]);
    });

});

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);



Route::auth();

Route::get('/home', ['as' => 'user.home', 'uses' => 'HomeController@index', 'middleware' => 'auth']);

Route::group(['prefix'=>'order'], function() {


    Route::get('/receive', [
        'as' => 'order.receive',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@receive'
    ]);

    Route::get('/receive-item/{num}', [
        'as' => 'order.receive_item',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@receive_item'
    ]);

    Route::get('/dispatch', [
        'as' => 'order.dispatch',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@dispatch_orders'
    ]);

    Route::get('/dispatch-item/{num}', [
        'as' => 'order.process',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@process'
    ]);

    Route::get('/process/{num}', [
        'as' => 'order.process',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@process'
    ]);

    Route::get('/view-all', [
        'as' => 'order.index',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@view_all'
    ]);

    Route::get('/search-stock', [
        'as' => 'stock.search',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@stock_search'
    ]);

    Route::post('/search-stock-result', [
        'as' => 'stock.search_result',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@stock_search_result'
    ]);

    Route::get('/make-paid/{num}', [
        'as' => 'order.make_paid',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@make_paid'
    ]);

    Route::post('/post-paid', [
        'as' => 'order.post_paid',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@post_paid'
    ]);

    Route::get('/view/{num}', [
        'as' => 'order.user_view',
        'middleware' => ['auth'],
        'uses' => 'OrdersController@user_view'
    ]);
        
});