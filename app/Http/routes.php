<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
   
    Route::auth();

    Route::get('/', function () {
    	return view('welcome');
		});

	Route::get('test', function()
        {
	       dd(Config::get('mail'));
    });

	Route::get('/profile' , [
    	'as' => 'profile', 'uses' => 'HomeController@profile'
	]);

    Route::get('/home', 'HomeController@index');

    Route::resource('users', 'UserController', 
    	['except' => ['show','store','index','create']]
    );

    Route::get('lists/{id}/shares' , [
        'as' => 'lists.share', 'uses' => 'MyListController@share'
    ]);

    Route::post('lists/{id}/save' , [
        'as' => 'lists.save', 'uses' => 'MyListController@save'
    ]);

    Route::delete('lists/{id}/clear' , [
        'as' => 'lists.clear', 'uses' => 'MyListController@clear'
    ]);

    Route::resource('lists', 'MyListController',
        ['except' => 'index']
    );

    Route::resource('lists.items', 'ListItemController',
        ['except' => ['show','index','create']]
    );
    
    Route::resource('lists', 'MyListController');

    Route::delete('shares/{id}' , [
    	'as' => 'shares.clear', 'uses' => 'ShareController@clear'
	]);

    Route::resource('shares', 'ShareController',
    	['except' => ['destroy','update','edit','create','store']]
    );

    Route::resource('shares.shareitems', 'ShareItemController',
    	['except' => ['show','index','create']]
    );




});





