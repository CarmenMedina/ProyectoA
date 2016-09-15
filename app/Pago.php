<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'Pago';
    protected $primaryKey = 'idPago';

    protected $fillable = ['idPago','idCupon','numeroReferencia','fecha','monto','estado'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idPago');
    }
}