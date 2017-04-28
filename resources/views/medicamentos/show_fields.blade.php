<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    {!! $medicamento->id !!}
</div>

<!-- Laboratorio Id Field -->
<div class="form-group">
    {!! Form::label('laboratorio_id', 'Laboratorio:') !!}
    {!! $medicamento->laboratorio->nombre!!}
</div>

<!-- Clasificacion Id Field -->
<div class="form-group">
    {!! Form::label('clasificacion_id', 'Clasificacion:') !!}
    {!! $medicamento->clasificacion ? $medicamento->clasificacion->nombre : '' !!}
</div>

<!-- Unimed Id Field -->
<div class="form-group">
    {!! Form::label('unimed_id', 'Unimed:') !!}
    {!! $medicamento->unimed->nombre!!}
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! $medicamento->nombre !!}
</div>

<!-- Receta Field -->
<div class="form-group">
    {!! Form::label('receta', 'Receta:') !!}
    {!! $medicamento->receta !!}
</div>

<!-- Cnt Total Field -->
<div class="form-group">
    {!! Form::label('cnt_total', 'Cnt Total:') !!}
    {!! $medicamento->cnt_total !!}
</div>

<!-- Cnt Formula Field -->
<div class="form-group">
    {!! Form::label('cnt_formula', 'Cnt Formula:') !!}
    {!! $medicamento->cnt_formula !!}
</div>

<!-- Indicaciones Field -->
<div class="form-group">
    {!! Form::label('indicaciones', 'Indicaciones:') !!}
    {!! $medicamento->indicaciones !!}
</div>

<!-- Dosis Field -->
<div class="form-group">
    {!! Form::label('dosis', 'Dosis:') !!}
    {!! $medicamento->dosis !!}
</div>

<!-- Contraindicaciones Field -->
<div class="form-group">
    {!! Form::label('contraindicaciones', 'Contraindicaciones:') !!}
    {!! $medicamento->contraindicaciones !!}
</div>

<!-- Advertencias Field -->
<div class="form-group">
    {!! Form::label('advertencias', 'Advertencias:') !!}
    {!! $medicamento->advertencias !!}
</div>

<!-- Generico Field -->
<div class="form-group">
    {!! Form::label('generico', 'Generico:') !!}
    {!! $medicamento->generico !!}
</div>

<!-- Contiene Field -->
<div class="form-group">
    {!! Form::label('contiene', 'Contiene:') !!}
    {!! $medicamento->contiene !!}
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! $medicamento->created_at !!}
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! $medicamento->updated_at !!}
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    {!! $medicamento->deleted_at !!}
</div>

