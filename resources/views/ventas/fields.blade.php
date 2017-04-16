@push('css')
@include('layouts.select2_css')
@include('layouts.plugins.datepiker_css')
@endpush
<!-- Cliente Id Field -->
<div class="form-group col-sm-12">
    <label for="clients" class="control-label">Cliente: <a class="success" data-toggle="modal" href="#modal-form-cliente">nuevo</a></label>
    <select name="cliente_id" id="clients" class="form-control" style="width: 100%">
        <option value=""> -- Select One -- </option>
        @foreach($clientes as $clt)
            <option value="{{$clt->id}}">{{$clt->nit.' '.$clt->nombres.' '.$clt->apellidos}}</option>
        @endforeach
    </select>
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', \Carbon\Carbon::today()->format('d/m/Y'), ['class' => 'form-control']) !!}
</div>

<!-- Serie Field -->
<div class="form-group col-sm-12">
    {!! Form::label('serie', 'Serie:') !!}
    {!! Form::text('serie', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-12">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>


@push('scripts')
@include('layouts.select2_js')
@include('layouts.plugins.datepiker_js')
<script>
    $("#fecha").datepicker({
        language : 'es'
    });
    $('#clients').select2({
        language: 'es'
    })
</script>
@endpush


