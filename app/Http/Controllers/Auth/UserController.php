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


    public function getLogin()
    {
        if(view()->exists('auth.authenticate')){
            return view('auth.authenticate');
        }

            return view('auth.login');
    }





}