@push('css')
@include('layouts.select2_css')
@endpush


<!-- Laboratorio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laboratorio_id', 'Laboratorio:') !!}
    {!! Form::select('laboratorio_id', $laboratorios, null, ['class' => 'form-control','id'=>'laboratorio_id','multiple'=>"multiple"]) !!}
</div>
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>


<!-- Clasificacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clasificacion_id', 'Vía de administración / Presentación:') !!}
    {!! Form::select('clasificacion_id', $clasificaciones, null, ['class' => 'form-control','id'=>'clasificacion_id','multiple'=>"multiple"]) !!}
</div>

<!-- Unimed Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unimed_id', 'Unimed:') !!}
    {!! Form::select('unimed_id', $unimeds, null, ['class' => 'form-control','id'=>'unimed_id','multiple'=>"multiple"]) !!}
</div>

{{--<!-- Item Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('item_id', 'Item:') !!}--}}
    {{--{!! Form::number('item_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}



<!-- Cnt Total Field -->
<div class="form-group col-sm-3">
    {!! Form::label('cnt_total', 'Cnt Total:') !!}
    {!! Form::text('cnt_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Cnt Formula Field -->
<div class="form-group col-sm-3">
    {!! Form::label('cnt_formula', 'Cnt Formula:') !!}
    {!! Form::text('cnt_formula', null, ['class' => 'form-control']) !!}
</div>

<!-- Generico Field -->
<div class="form-group col-sm-3">
    {!! Form::label('generico', 'Generico:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('generico', false) !!}
        {!! Form::checkbox('generico', '1', $medicamento->generico=='SI' ? 1 : 0 ) !!} 1
    </label>
</div>

<!-- Receta Field -->
<div class="form-group col-sm-3">
    {!! Form::label('receta', 'Receta:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('receta', false) !!}
        {!! Form::checkbox('receta', '1', $medicamento->receta=='SI' ? 1 : 0 )!!} 1
    </label>
</div>


<!-- Indicaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('indicaciones', 'Indicaciones:') !!}
    {!! Form::textarea('indicaciones', null, ['class' => 'form-control','rows'=>'2']) !!}
</div>

<!-- Dosis Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('dosis', 'Dosis:') !!}
    {!! Form::textarea('dosis', null, ['class' => 'form-control','rows'=>'2']) !!}
</div>

<!-- Contraindicaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contraindicaciones', 'Contraindicaciones:') !!}
    {!! Form::textarea('contraindicaciones', null, ['class' => 'form-control','rows'=>'2']) !!}
</div>

<!-- Advertencias Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('advertencias', 'Advertencias:') !!}
    {!! Form::textarea('advertencias', null, ['class' => 'form-control','rows'=>'2']) !!}
</div>

<!-- Contiene Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contiene', 'Contiene:') !!}
    {!! Form::textarea('contiene', null, ['class' => 'form-control','rows'=>'2']) !!}
</div>

@push('scripts')
@include('layouts.select2_js')
<script>

    $('#unimed_id,#laboratorio_id,#clasificacion_id').select2({
        language: 'es',
        maximumSelectionLength: 1
    })

</script>
@endpush