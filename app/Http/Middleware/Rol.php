<?php
/**
 * Created by PhpStorm.
 * User: Carmen Botello
 * Date: 13/09/2016
 * Time: 03:14 PM
 */

namespace App\Http\Middleware;

use App\Usuario;
use Closure;
use Illuminate\Support\Facades\Auth;

class Rol
{
    protected $hierarchy =[
        'admin' => 3,
        'otro'   =>0
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next, $roles)
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