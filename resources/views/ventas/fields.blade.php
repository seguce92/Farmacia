@push('css')
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
            <label for="clients" class="control-label">Cliente: <a class="success" data-toggle="modal" href="#modal-form-cliente" tabindex="1000">nuevo</a></label>
            {!! Form::select('cliente_id', $clientes ,1,['class' => 'form-control', 'id'=>'clientes','multiple'=>"multiple",'style' => "width: 100%"]) !!}
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
                <input type="text" name="recibido" id="recibido" class="form-control" placeholder="Q Recibido" value="{{old('recibido')}}" data-toggle="tooltip" title="Doble Enter para procesar">
                <div class="input-group-btn ">
                    {{--<button type="button" class="btn btn-info">guardar</button>--}}
                    <button type="submit" id="btn-procesar" name="procesar" value="1" class="btn btn-success" disabled data-loading-text="<i class='fa fa-cog fa-spin fa-1x fa-fw'></i> Procesando">
                        <span data-toggle="tooltip" title="Ingrese un monto mayor al total para procesar">

                        <span class="glyphicon glyphicon-ok" ></span> Procesar
                        </span>
                    </button>
                    <a class="btn btn-danger" data-toggle="modal" href="#modal-cancel-venta">
                        <span data-toggle="tooltip" title="Cancelar venta">X</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-cancel-venta">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cancelar venta</h4>
            </div>
            <div class="modal-body">
                Seguro que desea cancelar la venta?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                <a href="{{route('ventas.cancelar',['id' => $tempVenta->id])}}" class="btn btn-danger">
                    SI
                </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('scripts')
<script>
    $("#fecha").datepicker({
        language : 'es'
    });
    $('#clientes').select2({
        language: 'es',
        maximumSelectionLength: 1,
        allowClear: true
    });

    
    $("#recibido").keyup(function (e) {
        vuelto()
    })

    function vuelto() {
        var Total = parseFloat($("#h-total").val());
        var recibido = parseFloat($("#recibido").val());
//        console.log(Total,recibido);

        recibido = isNaN(recibido) ? 0 : recibido;

        var vuelto = recibido==0 ? 0 : recibido-Total;

        var vueltoTexto="Q "+addComas(vuelto.toFixed(2));
        $("#vuelto").text(vueltoTexto);

        if(recibido>=Total && Total>0){
            $("#btn-procesar").attr('disabled',false)
        }else{
            $("#btn-procesar").attr('disabled',true)
        }
    }

    $("#recibido").keypress(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            $("#btn-procesar").focus();
        }
    });

    $("#btn-procesar").click(function () {
        $(this).button('loading');
    })

</script>
@endpush


