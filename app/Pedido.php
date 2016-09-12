<?php
/**
 * Created by PhpStorm.
 * User: Carmen Botello
 * Date: 08/09/2016
 * Time: 02:50 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Pedido';
    protected $primaryKey = 'idPedido';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idPedido', 'idFactura', 'estado'];

    /**
     * @return array
     */
    public function guia()
    {
        return $this->belongsTo(Guia::class, 'idGuia');
    }


}