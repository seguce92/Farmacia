<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $horario->id !!}</p>
</div>

<!-- Dia Field -->
<div class="form-group">
    {!! Form::label('dia', 'Dia:') !!}
    <p>{!! $horario->dia !!}</p>
</div>

<!-- Hora Ini Field -->
<div class="form-group">
    {!! Form::label('hora_ini', 'Hora Ini:') !!}
    <p>{!! $horario->hora_ini !!}</p>
</div>

<!-- Hora Fin Field -->
<div class="form-group">
    {!! Form::label('hora_fin', 'Hora Fin:') !!}
    <p>{!! $horario->hora_fin !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $horario->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $horario->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $horario->deleted_at !!}</p>
</div>

