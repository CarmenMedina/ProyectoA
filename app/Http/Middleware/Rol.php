<?php
/**
 * Created by PhpStorm.
 * User: Carmen Botello
 * Date: 13/09/2016
 * Time: 03:14 PM
 */

namespace App\Http\Middleware;

use App\Http\Requests\Request;
use App\Usuario;
use App\Roles;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Rol
{
    protected $hierarchy =[
        'admin' => 3,
        'otro'   =>0
    ];


    public function handle(Request $request, Closure $next)
    {
        $usuario = Auth::user()->idUsuario;
        $count = Usuario::where('idUsuario', $usuario)->
        wherehas('roles',function($query){
            $query->where('descripcion','admin');
        })->get();
        if($count != '[]')
        {
            $roles ='admin';
        }else{
            $roles ='otro';

        }
        if($roles == 'admin'){
            return $next($request);
        }
        abort(404);

    }


}