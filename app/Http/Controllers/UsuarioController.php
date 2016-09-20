<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Auth;



class UsuarioController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function getLogin()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('auth.login');
    }

    /**
     * UsuarioController constructor.
     * @param Guard $auth
     */

    public function __construct(Guard $auth)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email' , 'password');
        //dd($request->email);

        if ($this->authorizeattempt($credentials, $request->has('remember')))
        {
            //return redirect('home');
            dd('prueba');
        }
        dd('prueba2');
        /* return redirect('login');*/

    }
}
