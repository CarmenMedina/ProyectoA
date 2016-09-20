<?php
/**
 * Created by PhpStorm.
 * User: Carmen Botello
 * Date: 08/09/2016
 * Time: 03:26 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Guia;

class EditController extends Controller
{
    /**
     * @param Pedido $idPedido
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editOrder($idPedido)
    {
        $pedidos = Pedido::find($idPedido);
        return view('order/edit-order', compact('pedidos'));
    }

    public function updateOrder(Request $request, $idPedido)
    {
        $pedidos = Pedido::find($idPedido);

        $pedidos->idFactura = $request -> idFactura;;
        $pedidos->estado = $request-> estado;
        $pedidos->guia->numeroGuia = $request-> numeroGuia;
        $pedidos->guia->urlRastreo = $request-> urlRastreo;
        $pedidos->guia->urlEtiqueta = $request-> urlEtiqueta;

        $pedidos->save();
        $pedidos->guia->save();

        $this->validate($request, [
            'idFactura' => 'required|max:255',
            'estado' => 'required|max:50',
            'numeroGuia' => 'required|max:255',
            'urlRastreo' => 'required|max:255',
            'urlEtiqueta' => 'required|max:255',
        ]);

        return redirect('list');
    }
}
