@push('css')
@include('layouts.select2_css')
@include('layouts.plugins.datepiker_css')
@endpush
<!-- Proveedore Id Field -->
<div class="form-group col-sm-4">
    <label for="proveedores" class="control-label">Proveedor:</label>
    <select name="proveedore_id" id="proveedores" class="form-control" style="width: 100%">
        <option value=""> -- Select One -- </option>
        @if(isset($compra))
            <option value="{{$compra->proveedore_id}}" selected>{{$compra->proveedor->nombre}}</option>
        @endif
        @if(old('proveedore_id'))
            <option value="{{old('proveedore_id')}}" selected>{{$proveedores[old('proveedore_id')]}}</option>
        @endif
    </select>
</div>

<div class="form-group col-sm-4">
	<label for="tcomprobantes" class="control-label">Tipo de comprobante:</label>
    <select name="tcomprobante_id" id="tcomprobantes" class="form-control" style="width: 100%">
        <option value=""> -- Select One -- </option>
        @foreach($tcomps as $tc)
            <option value="{{$tc->id}}" >{{$tc->descripcion}}</option>
        @endforeach
    </select>
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
</div>

<!-- Serie Field -->
<div class="form-group col-sm-4">
    {!! Form::label('serie', 'Serie:') !!}
    {!! Form::text('serie', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-4">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>



@push('scripts')
@include('layouts.select2_js')
@include('layouts.plugins.datepiker_js')
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
            theme: "classic",
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

        $("#tcomprobantes").select2({
            theme: 'classic',
            language : 'es',
            {{--ajax: {--}}
                {{--url: "{{ route('api.tcomprobantes.index') }}",--}}
                {{--dataType: 'json',--}}
                {{--data: function (params) {--}}
                    {{--return {--}}
                        {{--search: params.term, // search term--}}
                        {{--page: params.page--}}
                    {{--};--}}
                {{--},--}}
                {{--processResults: function (data, params) {--}}

                    {{--return {--}}
                        {{--results: data.data,--}}
                    {{--};--}}
                {{--},--}}
                {{--cache: true--}}
            {{--},--}}
            //escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
//            minimumInputLength: 1,
//            templateResult: function (data) {
//                return data.descripcion
//            },
//            templateSelection: function (data) {
//                if(data.id === '')
//                    return 'Ingrese descripcion';
//                else
//                    return data.descripcion
//            },
        });

        $("#fecha").datepicker({
            language : 'es'
        });
    })
</script>
@endpush