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

$navLinks=json_decode('[
        {
            "title":"Inicio",
            "view" : "",
            "color":"deepskyblue"
        },
        {
            "title":"Sucursales",
            "view" : "branch",
            "color":"indianred"
        },
        {
            "title":"Nosotros",
            "view" : "us",
            "color":"palevioletred"
        },
        {
            "title":"Productos",
            "view": "product",
            "color":"darkseagreen"
        },
        {
            "title":"Administración",
            "view": "management",
            "color":"yellowgreen"
        }

    ]');

View::share('navLinks', $navLinks);


Route::get('/', function () {
    return view('index.index',['viewName' => '']);
});

Route::get('/branch', function () {
    return view('branch.index' , ['viewName' => 'branch']);
});

Route::get('/product','ProductController@getIndex');
Route::post('/product/create','ProductController@postCreate');
Route::get('/product/create','ProductController@getCreate');

Route::get('/management', function () {
    return view('management.index',  ['viewName' => 'management']);
});

Route::get('/us', function () {
    return view('us.index',  ['viewName' => 'us']);
});


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');