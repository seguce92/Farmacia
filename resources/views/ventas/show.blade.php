@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Venta
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @include('ventas.show_fields')
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-bordered table-hover table-condensed">
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total=0;
                            @endphp
                            @foreach($venta->ventaDetalles as $det)
                                <tr>
                                    <td>{{$det->item->nombre}}</td>
                                    <td>Q {{$det->precio}}</td>
                                    <td>{{$det->cantidad}}</td>
                                    <td>Q {{number_format($det->cantidad*$det->precio,2)}}</td>
                                </tr>
                                @php
                                    $total+=($det->cantidad*$det->precio);
                                @endphp
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="4"><span class="pull-right">Total Q {{number_format($total,2)}}</span></th>
                            </tr>
                            </tfoot>
                        </table>
                        
                        <span class="label label-success">Recibido Q{{$venta->recibido}}</span>
                        <span class="label label-default">Vuelto Q{{number_format($venta->recibido-$total,2)}}</span>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <a href="{!! route('ventas.index') !!}" class="btn btn-default">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
