<?php
namespace App;

use App\Roles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $table = 'usuario';
    protected $primaryKey ='idUsuario';

    protected $fillable = ['nombre', 'apellido', 'email', 'password'];

    public function roles()
    {
        return $this->belongsToMany('App\Roles', 'usuariosroles','idUsuario','idRol');
    }
}