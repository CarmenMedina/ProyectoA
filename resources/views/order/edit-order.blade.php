@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Actualizar Pedido</div>
                    <div class="panel-body">
                        @include('partials/errors')

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('order/edit-order', $pedidos->idPedido) }}">
                            {!! method_field('PUT') !!}
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Id Factura</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="idFactura" value="{{ old('idFactura', $pedidos->idFactura) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Estado</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="estado" value="{{ old('estado', $pedidos->estado) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Número de Guía</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="numeroGuia" value="{{ old('numeroGuia', $pedidos->guia->numeroGuia) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Url de Rastreo</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="urlRastreo" value="{{ old('urlRastreo', $pedidos->guia->urlRastreo) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Url de Etiqueta</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="urlEtiqueta" value="{{ old('urlEtiqueta', $pedidos->guia->urlEtiqueta) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
