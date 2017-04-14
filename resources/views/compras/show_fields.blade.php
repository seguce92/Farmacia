
<!-- Proveedore Id Field -->
{!! Form::label('proveedor', 'Proveedore Id:') !!}
{!! $compra->proveedor->nombre !!}
<br>

<!-- Fecha Field -->
{!! Form::label('fecha', 'Fecha:') !!}
{!! $compra->fecha !!}

<br>
<!-- Serie Field -->
{!! Form::label('serie', 'Serie:') !!}
{!! $compra->serie !!}
<br>

<!-- Numero Field -->
{!! Form::label('numero', 'Numero:') !!}
{!! $compra->numero !!}
<br>

<!-- Cestado Id Field -->
{!! Form::label('cestado', 'Cestado Id:') !!}
{!! $compra->cestado->descripcion !!}
<br>

<!-- Created At Field -->
{!! Form::label('created_at', 'Created At:') !!}
{!! $compra->created_at !!}
<br>
<!-- Updated At Field -->
{!! Form::label('updated_at', 'Updated At:') !!}
{!! $compra->updated_at !!}
<br>
<br>

