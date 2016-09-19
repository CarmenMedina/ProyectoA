<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $auth;

    public function getLogin()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('auth.login');
    }

    /**
     * Create a new authentication controller instance.
     *
     * @param Guard $auth
     */

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);

    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email' , 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect('home');
        }

        return redirect('login');

    }





}
