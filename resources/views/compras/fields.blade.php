@push('css')
@include('layouts.select2_css')
@endpush
<!-- Proveedore Id Field -->
<div class="form-group col-sm-6">
    <label for="proveedores" class="control-label">Proveedor:</label>

    <select name="name" id="proveedores" class="form-control">
        <option value=""> -- Select One -- </option>
    </select>
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Serie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serie', 'Serie:') !!}
    {!! Form::text('serie', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Cestado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cestado_id', 'Cestado Id:') !!}
    {!! Form::number('cestado_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('compras.index') !!}" class="btn btn-default">Cancel</a>
</div>
@push('scripts')
@include('layouts.select2_js')
<script>
    $(function () {
        function formatState (state) {
            var $state = $(
                    '<span>Nombre: '+ state.nombre+ '</span><br>'+
                    '<span>Razon: ' + state.razon_social+ '</span><br>'+
                    '<span>Nit: ' + state.nit+ '</span><br>'
            );
            return $state;
        };


        $("#proveedores").select2({
            language : 'es',
            ajax: {
                url: "{{ route('api.proveedors.index') }}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {

                    return {
                        results: data.data,
                    };
                },
                cache: true
            },
            //escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatState,
            templateSelection: function (data) {
                if(data.id === '')
                    return 'Ingrese nombre,razon social o nit';
                else
                    return data.nombre
            },
        });
    })
</script>
@endpush