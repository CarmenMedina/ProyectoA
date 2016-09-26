<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'Servicio';
    protected $primaryKey = 'idServicio';

    protected $fillable = ['idServicio','descripcion','costoReal','costoEspecial','entrega','detalle','idPaqueteria', 'tipo', 'pesoGE', 'pesoLE'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idServicio');
    }
}