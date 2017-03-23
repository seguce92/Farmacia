<table class="table table-responsive" id="tcomprobantes-table">
    <thead>
        <th>Descripcion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tcomprobantes as $tcomprobante)
        <tr>
            <td>{!! $tcomprobante->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['tcomprobantes.destroy', $tcomprobante->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tcomprobantes.show', [$tcomprobante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tcomprobantes.edit', [$tcomprobante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>