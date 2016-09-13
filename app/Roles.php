<?php
/**
 * Created by PhpStorm.
 * User: Carmen Botello
 * Date: 12/09/2016
 * Time: 11:01 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Roles';
    protected $primaryKey = 'idRol';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idRol', 'descripcion'];

    public function usuariosroles()
    {
        return $this->belongsToMany(UsuarioRoles::class, 'idRol');
    }
}