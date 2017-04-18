<!-- Id Field -->
<div class="form-group">
    {{--{!! Form::label('id', 'Id:') !!} {!! $venta->id !!}--}}
    <br>
    {!! Form::label('cliente', 'Cliente:') !!}
    {!! $venta->cliente->nombres." ".$venta->cliente->apellidos  !!}
    <br>

    {!! Form::label('fecha', 'Fecha:') !!}
    {!! fecha($venta->fecha) !!}
    <br>

    {!! Form::label('serie', 'Serie:') !!}
    {!! $venta->serie !!}
    <br>

    {!! Form::label('numero', 'Numero:') !!}
    {!! $venta->numero !!}
    <br>

    {!! Form::label('vestado', 'Vestado:') !!}
    {!! $venta->vestado->descripcion !!}
    <br>

    {!! Form::label('user', 'Usuario:') !!}
    {!! $venta->user->name !!}
    <br>

    {!! Form::label('created_at', 'Created At:') !!}
    {!! $venta->created_at !!}
    <br>

    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! $venta->updated_at !!}
    <br>

{{--    {!! Form::label('deleted_at', 'Deleted At:') !!}--}}
    {{--{!! $venta->deleted_at !!}--}}
</div>


