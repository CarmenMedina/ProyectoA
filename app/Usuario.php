<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'Usuario';
    protected $primaryKey = 'idUsuario';

    protected $fillable = ['idUsuario','nombre','apellido','telefono','email','password','rfc',
        'idStripe', 'empresa'];


    public function pedido()
    {
        return $this->hasMany(Pedido::class, 'idUsuario');
    }
}