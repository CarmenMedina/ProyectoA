<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Pedido extends Model
{
    protected $table = 'Pedido';
    protected $primaryKey = 'idPedido';

    protected $fillable = [];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idGuia');
    }
}