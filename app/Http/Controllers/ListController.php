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

class ListController extends Controller
{
    public function getList(Request $request)
    {
       return view ('list',['pedidos' => Pedido::all()]);
    }


    public function postList()
    {
        return view('list');
    }
    
    
}