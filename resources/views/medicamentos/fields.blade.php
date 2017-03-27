<!-- Laboratotio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laboratotio_id', 'Laboratotio Id:') !!}
    {!! Form::number('laboratotio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Clasificacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clasificacion_id', 'Clasificacion Id:') !!}
    {!! Form::number('clasificacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Unimed Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unimed_id', 'Unimed Id:') !!}
    {!! Form::number('unimed_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_id', 'Item Id:') !!}
    {!! Form::number('item_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Receta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('receta', 'Receta:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('receta', false) !!}
        {!! Form::checkbox('receta', '1', null) !!} 1
    </label>
</div>

<!-- Cnt Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnt_total', 'Cnt Total:') !!}
    {!! Form::number('cnt_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Cnt Formula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnt_formula', 'Cnt Formula:') !!}
    {!! Form::number('cnt_formula', null, ['class' => 'form-control']) !!}
</div>

<!-- Indicaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('indicaciones', 'Indicaciones:') !!}
    {!! Form::textarea('indicaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Dosis Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('dosis', 'Dosis:') !!}
    {!! Form::textarea('dosis', null, ['class' => 'form-control']) !!}
</div>

<!-- Contraindicaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contraindicaciones', 'Contraindicaciones:') !!}
    {!! Form::textarea('contraindicaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Advertencias Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('advertencias', 'Advertencias:') !!}
    {!! Form::textarea('advertencias', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('medicamentos.index') !!}" class="btn btn-default">Cancel</a>
</div>
