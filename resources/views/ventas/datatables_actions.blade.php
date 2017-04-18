    <a href="{{ route('ventas.show', $id) }}" class='btn btn-info btn-xs' data-toggle="tooltip" title="Ver detalles">
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>

    <a href="#modal-delete-{{$id}}" data-toggle="modal" class='btn btn-danger btn-xs'>
        <i class="glyphicon glyphicon-remove" data-toggle="tooltip" title="Anular venta"></i>
    </a>

    <div class="modal fade" id="modal-delete-{{$id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Eliminar</h4>
                </div>
                <div class="modal-body">
                    Seguro que desea eliminar al usuario?
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