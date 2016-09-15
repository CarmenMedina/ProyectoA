<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    protected $table = 'Guia';
    protected $primaryKey = 'idGuia';

    protected $fillable = ['idGuia','idServicio','numeroGuia','urlRastreo','urlEtiqueta'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idGuia');
    }
}