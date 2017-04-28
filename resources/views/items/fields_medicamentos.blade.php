<!-- Laboratorio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laboratorio_id', 'Laboratorio:') !!}
    {!! Form::select('laboratorio_id', $laboratorios, $medicamento->laboratorio ? $medicamento->laboratorio->id : null, ['class' => 'form-control','id'=>'laboratorio_id','multiple'=>"multiple",'style'=>'width: 100%']) !!}
</div>

<!-- Clasificacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clasificacion_id', 'Vía de administración / Presentación:') !!}
    {!! Form::select('clasificacion_id', $clasificaciones, $medicamento->clasificacion ? $medicamento->clasificacion->id : null, ['class' => 'form-control','id'=>'clasificacion_id','multiple'=>"multiple",'style'=>'width: 100%']) !!}
</div>


<!-- Cnt Total Field -->
<div class="form-group col-sm-3">
    {!! Form::label('cnt_total', 'Cnt Total:') !!}
    {!! Form::text('cnt_total',  $medicamento->cnt_total, ['class' => 'form-control']) !!}
</div>

<!-- Cnt Formula Field -->
<div class="form-group col-sm-3">
    {!! Form::label('cnt_formula', 'Cnt Formula:') !!}
    {!! Form::text('cnt_formula', $medicamento->cnt_formula, ['class' => 'form-control']) !!}
</div>

<!-- Generico Field -->
<div class="form-group col-sm-3">
    {!! Form::label('generico', 'Generico:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('generico', false) !!}
        {!! Form::checkbox('generico', '1', $medicamento->generico ) !!} 1
    </label>
</div>

<!-- Receta Field -->
<div class="form-group col-sm-3">
    {!! Form::label('receta', 'Receta:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('receta', false) !!}
        {!! Form::checkbox('receta', '1', $medicamento->receta)!!} 1
    </label>
</div>


<!-- Indicaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('indicaciones', 'Indicaciones:') !!}
    {!! Form::textarea('indicaciones', $medicamento->indicaciones, ['class' => 'form-control','rows'=>'2']) !!}
</div>

<!-- Dosis Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('dosis', 'Dosis:') !!}
    {!! Form::textarea('dosis', $medicamento->dosis, ['class' => 'form-control','rows'=>'2']) !!}
</div>

<!-- Contraindicaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contraindicaciones', 'Contraindicaciones:') !!}
    {!! Form::textarea('contraindicaciones', $medicamento->contraindicaciones, ['class' => 'form-control','rows'=>'2']) !!}
</div>

<!-- Advertencias Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('advertencias', 'Advertencias:') !!}
    {!! Form::textarea('advertencias', $medicamento->advertencias, ['class' => 'form-control','rows'=>'2']) !!}
</div>

<!-- Contiene Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contiene', 'Contiene:') !!}
    {!! Form::textarea('contiene', $medicamento->contiene, ['class' => 'form-control','rows'=>'2']) !!}
    {!! Form::hidden('medicamento_id', $medicamento->id )!!}
</div>

@push('scripts')
<script>

    $('#unimed_id,#laboratorio_id,#clasificacion_id').select2({
        language: 'es',
        maximumSelectionLength: 1
    })

</script>
@endpush