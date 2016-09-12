<?php
/**
 * Created by PhpStorm.
 * User: Carmen Botello
 * Date: 08/09/2016
 * Time: 02:50 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Guia';
    protected $primaryKey = 'idGuia';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idGuia', 'numeroGuia', 'urlRastreo', 'urlEtiqueta'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idGuia');
    }
}