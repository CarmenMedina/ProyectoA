@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nuevo Pedido</div>
                    <div class="panel-body">
                        @include('partials/errors')

                        <form class="form-horizontal" role="form" method="POST" action="{{route('order/newOrder')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Id Llegada</label>

                                <div class="col-md-3">
                                    <select name="idLlegada" class="form-control" >
                                        @foreach($llegadas as $llegada)
                                            <option value="{{ $llegada->idDireccion }}">{{ $llegada->calle }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-md-3 control-label">Id Salida</label>

                                <div class="col-md-3 ">
                                    <select name="idSalida" class="form-control" >
                                        @foreach($salidas as $salida)
                                            <option value="{{ $salida->idDireccion }}">{{ $salida->calle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Id Usuario</label>

                                <div class="col-md-3">
                                    <select name="idUsuario" class="form-control" >
                                        @foreach($usuarios as $usuario)
                                            <option value="{{ $usuario->idUsuario }}">{{ $usuario->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-md-3 control-label">Id Pago</label>

                                <div class="col-md-3 ">
                                    <select name="idPago" class="form-control" >
                                    @foreach($pagos as $pago)
                                        <option value="{{ $pago->idPago }}">{{ $pago->idPago }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Id Guia</label>

                                <div class="col-md-3">
                                    <select name="idGuia" class="form-control" >
                                        @foreach($guias as $guia)
                                            <option value="{{ $guia->idGuia }}">{{ $guia->numeroGuia }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-md-3 control-label">Id Servicio</label>

                                <div class="col-md-3 ">
                                    <select name="idServicio" class="form-control" >
                                    @foreach($servicios as $servicio)
                                        <option value="{{ $servicio->idServicio }}">{{ $servicio->descripcion }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Id Transacción</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="idTransaccion" value="{{ old('idTransaccion') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Id Factura</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="idFactura" value="{{ old('idFactura') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Peso</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="peso" value="{{ old('peso') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Peso Volumétrico</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pesoVolumetrico" value="{{ old('pesoVolumetrico') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Largo</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="largo" value="{{ old('largo') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Ancho</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ancho" value="{{ old('ancho') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Alto</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="alto" value="{{ old('alto') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Fecha</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="fecha" value="{{ old('fecha') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripción</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Estado</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="estado" value="{{ old('etado') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Cantidad</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cantidad" value="{{ old('cantidad') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Monto</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="monto" value="{{ old('monto') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ingresar
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