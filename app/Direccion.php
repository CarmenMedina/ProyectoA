<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'Direccion';
    protected $primaryKey = 'idDireccion';

    protected $fillable = ['idDireccion','idCodigoPostal','idUsuario','fecha','calle','colonia','nombre',
        'correo', 'telefono', 'favorito', 'tipo', 'alias'];

    public function pedido()
    {
        return $this->hasMany(Pedido::class, 'idLlegada', 'idSalida');
    }
}