<?php
namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;


class UserController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $auth;

    public function getLogin()
    {
        if(view()->exists('auth.authenticate')){
            return view('auth.authenticate');
        }

            return view('auth.login');
    }

    public function __construct(Guard $auth)
    {
        //$this->auth = $this->$auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if($this->auth->attempt($credentials, $request->has('remember'))){
            return redirect('home');
        }
        return redirect('login');
    }



}