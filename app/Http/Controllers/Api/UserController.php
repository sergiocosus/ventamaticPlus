<?php

namespace Ventamatic\Http\Controllers\Api;

use Auth;
use Illuminate\Http\Request;
use Ventamatic\Http\Requests;
use Ventamatic\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getCurrent()
    {
        return Auth::user();
    }
}
