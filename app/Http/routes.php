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
            "title":"Productos",
            "view": "product",
            "color":"darkseagreen"
        },
        {
            "title":"Administración",
            "view": "management",
            "color":"yellowgreen"
        },
        {
            "title":"Nosotros",
            "view" : "us",
            "color":"palevioletred"
        }
    ]');

View::share('navLinks', $navLinks);

Route::get('/', function () {
    return view('index.index',['viewName' => '']);
});

Route::get('/branch', function () {
    return view('branch.index' , ['viewName' => 'branch']);
});

Route::get('/product', function () {
    return view('product.index' , ['viewName' => 'product']);
});

Route::get('/management', function () {
    return view('management.index',  ['viewName' => 'management']);
});

Route::get('/us', function () {
    return view('us.index',  ['viewName' => 'us']);
});
