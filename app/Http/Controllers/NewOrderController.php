<?php
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
            'idLlegada' => 'required|integer',
            'idSalida' => 'required|integer',
            'idUsuario' => 'required|integer',
            'idPago' => 'required|integer',
            'idGuia' => 'required|integer',
            'idServicio' => 'required|integer',
            'idTransaccion' => 'required|string|max:255',
            'idFactura' => 'required|string|max:255',
            'peso' => 'required|numeric',
            'pesoVolumetrico' => 'required|numeric',
            'largo' => 'required|numeric',
            'ancho' => 'required|numeric',
            'alto' => 'required|numeric',
            'fecha' => 'required',
            'descripcion' => 'required|string|max:30',
            'estado' => 'required|string|max:50',
            'cantidad' => 'required|integer',
            'monto' => 'required|integer',

        ]);

        if ($validator->fails()) {
            return redirect('order/new-order')
                ->withInput()
                ->withErrors($validator);
        }

        $pedidos = new Pedido($request->all());
        $pedidos->save();

        return redirect('order/new-order');
    }
}