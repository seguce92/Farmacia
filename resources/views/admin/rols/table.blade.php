<table class="table table-condensed table-hover table-bordered" id="rols-table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Descripción</th>
        <th width="10%">Operación</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rols as $rol)
        <tr>
            <td>{{$rol->id}}</td>
            <td>{{$rol->descripcion}}</td>
            <td>
                <a href="{{ action('RolController@edit',$rol->id) }}" class="btn btn-xs btn-info">
                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar"></span>
                </a>

                <a data-toggle="modal" href="#modal-delete" data-action="{{action('RolController@destroy',["id" => $rol->id])}}" class="btn btn-xs btn-danger btn-delete">
                    <span class="glyphicon glyphicon-remove" data-toggle="tooltip" title="Eliminar"></span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@push('scripts')
<script>
    $(function(){
        $('#rols-table').DataTable();

        $(".btn-delete").click(function () {
            var  acction =$(this).data("action");
            console.log("El formulario tomara el valor de "+acction);
            $("#form-delete").attr("action",acction);
        })
    });
</script>
@endpush