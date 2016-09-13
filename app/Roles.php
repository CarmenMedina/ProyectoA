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
    protected $table = 'Roles';
    protected $primaryKey = 'idRol';

    protected $fillable = ['idRol', 'descripcion'];

    public function usuario()
    {
        return $this->belongsToMany(Usuario::class, 'usuariosroles','idRol','idUsuario');
    }

}