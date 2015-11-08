<?php namespace Ventamatic\Http\Controllers\Api;

use Illuminate\Http\Request;
use Ventamatic\Category;
use Ventamatic\Http\Requests;
use Ventamatic\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getIndex()
    {
        return Category::all();
    }
}
