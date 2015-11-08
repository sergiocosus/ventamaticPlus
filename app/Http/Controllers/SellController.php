<?php

namespace Ventamatic\Http\Controllers;

use Illuminate\Http\Request;
use Ventamatic\Http\Requests;
use Ventamatic\Http\Controllers\Controller;
use View;

class SellController extends Controller
{
    public function __construct()
    {
        View::share('viewName', 'product');
    }

    public function getIndex()
    {
        return view('cart.index');
    }

    public function getSales()
    {
        return view('cart.sales');
    }

}
