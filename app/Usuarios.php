<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuarios extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';

    protected $fillable = ['email', 'password'];

    public function roles()
    {
        return $this->belongsToMany('App\Roles', 'usuariosroles','idUsuario','idRol');
    }
}
