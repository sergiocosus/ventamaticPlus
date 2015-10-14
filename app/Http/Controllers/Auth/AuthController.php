<?php

namespace Ventamatic\Http\Controllers\Auth;

use Auth;
use Redirect;
use Route;
use Ventamatic\User;
use Validator;
use Ventamatic\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $redirectPath = '/';
    protected $loginPath;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->loginPath = Redirect::back()->getTargetUrl();
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:30',
            'phone' => 'max:50',
            'cell_phone' => 'max:50',
            'address' => 'required|max:100',
            'rfc' => 'max:13',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function authenticated(){
        return Redirect::back();;
    }

    public function getRegister()
    {
        return view('auth.register', ['viewName' => '']);
    }


}
