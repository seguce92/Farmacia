    {{--<a href="{{ route('ventas.show', $id) }}" class='btn btn-info btn-xs' data-toggle="tooltip" title="Ver detalles">--}}
    <a href="#modal-detalles-{{$id}}" data-keyboard="true" data-toggle="modal" class='btn btn-info btn-xs' data-toggle="tooltip" title="Ver detalles">
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>

    <a href="#modal-delete-{{$id}}" data-toggle="modal" class='btn btn-danger btn-xs'>
        <i class="glyphicon glyphicon-remove" data-toggle="tooltip" title="Anular venta"></i>
    </a>

    <div class="modal fade modal-warning" id="modal-delete-{{$id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Canselar venta!</h4>
                </div>
                <div class="modal-body">
                    Seguro que desea cancelar la venta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <a href="{{route('ventas.anular',['id' => $id])}}" class="btn btn-danger">
                        SI
                    </a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="modal-detalles-{{$id}}" tabindex='-1'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Detalles de la venta</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                                $venta=\App\Models\Venta::findOrFail($id);
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
                    </div>

                </div>
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                {{--</div>--}}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->