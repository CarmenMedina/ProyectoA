<?php
/**
 * Created by PhpStorm.
 * User: Carmen Botello
 * Date: 12/09/2016
 * Time: 11:01 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class UsuarioRoles extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'UsusariosRoles';
    protected $primaryKey = 'idUsuarioRol';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idUsuarioRol', 'idUsuario', 'idRol'];

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'idRol');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
}