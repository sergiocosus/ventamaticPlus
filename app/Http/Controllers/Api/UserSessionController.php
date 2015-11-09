<?php namespace Ventamatic\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Ventamatic\UserSession;

class UserSessionController extends Controller {

	public function getIndex()
	{
		return UserSession::orderBy('created_at')->get();
	}

}