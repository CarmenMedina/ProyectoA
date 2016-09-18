<?php
/**
 * Created by PhpStorm.
 * User: Carmen Botello
 * Date: 15/09/2016
 * Time: 02:22 PM
 */

namespace App\Http\Controllers;


use App\Direccion;
use App\Guia;
use Illuminate\Http\Request;
use Validator;
use App\Pago;
use App\Pedido;
use App\Servicio;
use App\Usuario;

class NewOrderController extends Controller
{
    public function getOrder()
    {
        $guias = Guia::all();
        $usuarios = Usuario::all();
        $llegadas = Direccion::all();
        $salidas = Direccion::all();
        $pagos = Pago::all();
        $servicios = Servicio::all();
        return view('order/new-order', ['guias' => $guias, 'usuarios' => $usuarios, 'llegadas' => $llegadas, 'salidas' => $salidas, 'pagos' => $pagos, 'servicios' => $servicios]);
    }

    public function postOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idLlegada' => 'required',
            'idSalida' => 'required',
            'idUsuario' => 'required',
            'idPago' => 'required',
            'idGuia' => 'required',
            'idServicio' => 'required',
            'idTransaccion' => 'required',
            'idFactura' => 'required',
            'peso' => 'required',
            'pesoVolumetrico' => 'required',
            'largo' => 'required',
            'ancho' => 'required',
            'alto' => 'required',
            'fecha' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'cantidad' => 'required',
            'monto' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('order/new-order')
                ->withInput()
                ->withErrors($validator);
        }

        $pedidos = new Pedido;
        $pedidos->idLlegada = $request->idLlegada;
        $pedidos->idSalida = $request->idSalida;
        $pedidos->idUsuario = $request->idUsuario;
        $pedidos->idPago = $request->idPago;
        $pedidos->idGuia = $request->idGuia;
        $pedidos->idServicio = $request->idServicio;
        $pedidos->idTransaccion = $request->idTransaccion;
        $pedidos->idFactura = $request->idFactura;
        $pedidos->peso = $request->peso;
        $pedidos->pesoVolumetrico = $request->pesoVolumetrico;
        $pedidos->largo = $request->largo;
        $pedidos->ancho = $request->ancho;
        $pedidos->alto = $request->alto;
        $pedidos->fecha = $request->fecha;
        $pedidos->descripcion = $request->descripcion;
        $pedidos->estado = $request->estado;
        $pedidos->cantidad = $request->cantidad;
        $pedidos->monto = $request->monto;

        $pedidos->save();

        return redirect('order/new-order');
    }
}