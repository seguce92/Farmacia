@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compra
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('compras.show_fields')

                    <table class="table table-bordered table-hover table-condenced">
                    	<thead>
                    		<tr>
                    			<th>Producto</th>
                    			<th>Precio</th>
                    			<th>Cantidad</th>
                    			<th>Subtotal</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                            @foreach($compra->compraDetalles as $det)
                    		<tr>
                    			<td>{{$det->item->nombre}}</td>
                    			<td>{{$det->precio}}</td>
                    			<td>{{$det->cantidad}}</td>
                    			<td>{{$det->cantidad*$det->precio}}</td>
                    		</tr>
                                @endforeach
                    	</tbody>
                    </table>
                    <a href="{!! route('compras.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
