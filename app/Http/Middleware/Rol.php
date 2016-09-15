<?php
namespace App\Http\Middleware;

use App\Http\Requests\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Usuario;

class Rol
{
    public function handle(Request $request, Closure $next)
    {
        $usuario = Auth::user()->idUsuario;
        $count = Usuario::where('idUsuario', $usuario)->
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