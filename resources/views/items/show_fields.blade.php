<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    {!! $item->id !!}
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! $item->nombre !!}
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! $item->descripcion !!}
</div>

<!-- Precio Field -->
<div class="form-group">
    {!! Form::label('precio', 'Precio:') !!}
    {!! $item->precio !!}
</div>

<!-- Codigo Field -->
<div class="form-group">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! $item->codigo !!}
</div>

<!-- Unimed Id Field -->
<div class="form-group">
    {!! Form::label('unimed_id', 'U/M:') !!}
    {!! $item->unimed->nombre !!}
</div>

<!-- Precio Pro Field -->
<div class="form-group">
    {!! Form::label('precio_pro', 'Precio Pro:') !!}
    {!! $item->precio_pro !!}
</div>

<!-- Iestado Id Field -->
<div class="form-group">
    {!! Form::label('iestado_id', 'Estado:') !!}
    {!! $item->iestado->descripcion !!}
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! $item->created_at !!}
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! $item->updated_at !!}
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    {!! $item->deleted_at !!}
</div>

