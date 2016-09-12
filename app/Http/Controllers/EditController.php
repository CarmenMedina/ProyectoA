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
    public function editOrder(Pedido $idPedido)
    {
        $idPedido=1;
        $pedidos = Pedido::find($idPedido);
        dd($pedidos);
       // return view('order/edit-order', compact('pedidos'));
    }

    public function updateOrder(Request $request, $pedidos)
    {
        $pedidos->fill($request->only(['idFactura', 'estado', 'numeroGuia', 'urlRastreo', 'urlEtiqueta']));
        $pedidos->save();

        $this->validate($request, [
            'idFactura' => 'required|max:255',
            'estado' => 'required|max:50',
            'numeroGuia' => 'required|max:255',
            'urlRastreo' => 'required|max:255',
            'urlEtiqueta' => 'required|max:255',
        ]);

        return redirect('list')
            ->with('alert', 'Your profile has been updated');
    }
}