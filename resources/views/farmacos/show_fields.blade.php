<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $farmaco->id !!}</p>
</div>

<!-- Fcategoria Id Field -->
<div class="form-group">
    {!! Form::label('fcategoria_id', 'Categoría:') !!}
    <p>{!! $farmaco->fcategoria->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $farmaco->nombre !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $farmaco->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $farmaco->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $farmaco->deleted_at !!}</p>
</div>

