<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Pedido extends Model
{
    protected $table = 'Pedido';
    protected $primaryKey = 'idPedido';

    protected $fillable = ['idPedido','idLlegada','idSalida','idUsuario','idPago','idGuia','idServicio',
        'idTransaccion', 'idFactura', 'peso', 'pesoVolumetrico', 'largo', 'ancho', 'alto', 'fecha', 'descripcion',
            'estado', 'cantidad', 'monto'];

    public function guia()
    {
        return $this->belongsTo(Guia::class, 'idGuia');
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'idPago');
    }

    public function direccion()
    {
        return $this->belongsToMany(Direccion::class, 'idDireccion');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'idServicio');
    }

    public function usuario()
    {
        return $this->belongsToMany(Usuario::class, 'idUsuario');
    }
}