<?php

namespace App\Http\Middleware;

use App\Usuario;
use App\Usuarios;
use Closure;
use Illuminate\Support\Facades\Auth;

class Rol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usuario = Auth::user()->idUsuario;
        $count = Usuarios::where('idUsuario', $usuario)->
        wherehas('roles', function ($query){
            $query->where('descripcion', 'admin');
        })->get();

        if($count != '[]'){
            $roles = 'admin';
        }else{
            $roles='otro';
        }

        if($roles == 'admin'){
            return $next($request);
        }
        abort(404);
    }
}
