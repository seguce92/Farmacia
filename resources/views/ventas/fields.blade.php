@push('css')
@include('layouts.select2_css')
@include('layouts.plugins.datepiker_css')
<style>
    .panel-body{
        padding-bottom: 0px;
        padding-left: 0px;
        padding-right: 0px;
    }
    .panel {
        margin-bottom: 0px;
        border-radius: 0px;

    }
</style>
@endpush
<!-- Cliente Id Field -->
<div class="panel panel-default">
	<div class="panel-body">
        <div class="form-group col-sm-12">
            <label for="clients" class="control-label">Cliente: <a class="success" data-toggle="modal" href="#modal-form-cliente">nuevo</a></label>
            <select name="cliente_id" id="clients" class="form-control" style="width: 100%">
                <option value=""> -- Select One -- </option>
                @foreach($clientes as $clt)
                    <option value="{{$clt->id}}">{{$clt->nit.' '.$clt->nombres.' '.$clt->apellidos}}</option>
                @endforeach
            </select>
        </div>
	</div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <h4>No. Productos:</h4>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-right" >
            <h4 class="text-right" id="num-items">0</h4>
        </div>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <h4>Total</h4>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-right" >
            <h4 class="text-right" id="total-venta">Q 0.00</h4>
            <input type="hidden" id="h-total" value="0">
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <h4>Vuelto</h4>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-right" >
            <h4 class="text-right" id="vuelto">Q 0.00</h4>
        </div>
    </div>
</div>
<!-- Fecha Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('fecha', 'Fecha:') !!}--}}
    {{--{!! Form::text('fecha', \Carbon\Carbon::today()->format('d/m/Y'), ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Serie Field -->--}}
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('serie', 'Serie:') !!}--}}
    {{--{!! Form::text('serie', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Numero Field -->--}}
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('numero', 'Numero:') !!}--}}
    {{--{!! Form::text('numero', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group col-sm-12">
            <div class="input-group">
                <input type="text" name="recibido" id="recibido" class="form-control" placeholder="Q Recibido">
                <div class="input-group-btn ">
                    {{--<button type="button" class="btn btn-info">guardar</button>--}}
                    <button type="submit" id="btn-procesar" name="procesar" value="1" class="btn btn-success" disabled >
                        <span data-toggle="tooltip" title="Ingrese un monto mayor al total para procesar">

                        <span class="glyphicon glyphicon-ok" ></span> Procesar
                        </span>
                    </button>
                    <a href="{{route('ventas.cancelar',['id' => $tempVenta->id])}}" class="btn btn-danger">
                        X
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>




@push('scripts')
@include('layouts.select2_js')
@include('layouts.plugins.datepiker_js')
<script>
    $("#fecha").datepicker({
        language : 'es'
    });
    $('#clients').select2({
        language: 'es'
    })


    
    $("#recibido").keyup(function (e) {
        var Total = parseFloat($("#h-total").val());
        var recibido = parseFloat($(this).val());

        recibido = isNaN(recibido) ? 0 : recibido;

        var vuelto = recibido==0 ? 0 : recibido-Total;

        var vueltoTexto="Q "+addComas(vuelto.toFixed(2));
        $("#vuelto").text(vueltoTexto);

        if(recibido>Total && Total>0){
            $("#btn-procesar").attr('disabled',false)
        }else{
            $("#btn-procesar").attr('disabled',true)
        }
    })
</script>
@endpush


