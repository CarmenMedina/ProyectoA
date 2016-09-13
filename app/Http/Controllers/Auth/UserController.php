<?php
/**
 * Created by PhpStorm.
 * User: Carmen Botello
 * Date: 13/09/2016
 * Time: 12:09 PM
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Usuario as Usuario;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Auth;

class UserController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('auth.login');
    }


    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect('home');
        }

        return redirect('login');

    }



}