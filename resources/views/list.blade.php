@extends('layout')

@section('content')

        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Orders</strong>
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <thead>

                        <tr>

                            <th>Id Pedido</th>
                            <th>Id Factura</th>
                            <th>Estado</th>
                            <th>Número de Guía</th>
                            <th>URL de Rastreo</th>
                            <th>URL de Etiqueta</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($pedidos as $pedido)
                            <tr class="success">
                                <td class="table-text">
                                    <div>{{$pedido->idPedido}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$pedido->idFactura}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$pedido->estado}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$pedido->guia->numeroGuia}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$pedido->guia->urlRastreo}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$pedido->guia->urlEtiqueta}}</div>
                                </td>
                                <td class="table-text">
                                    <a href="{{url('order/edit-order', $pedido->idPedido)}}"> Update </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection