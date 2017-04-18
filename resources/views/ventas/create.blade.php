@extends('adminlte::layouts.app')

@include('layouts.xtra_condensed_css')

@section('content')
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')

        {!! Form::model($tempVenta, ['route' => ['ventas.update', $tempVenta->id], 'method' => 'patch']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <!-- TAB NAVIGATION -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Artículos</a></li>
                    <li><a href="#tab2" role="tab" data-toggle="tab">Detalles</a></li>
                </ul>
                <!-- TAB CONTENT -->
                <div class="tab-content">
                    <div class="active tab-pane fade in" id="tab1">
                        {{--Box busqueda--}}
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    <strong>
                                        Busqueda
                                    </strong>
                                </h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    {{--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" id="datos-new-det">
                                <div class="form-group">
                                    <select name="item_id" id="items" class="form-control" style="widows: 100%;">
                                        <option value=""> -- Select One -- </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Stock actual</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static" id="stock-actual"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">Cant</span>
                                            <input type="text" name="cantidad" id="cant-new-det"  class="form-control"  value="1">
                                        </div>
                                    </div>
                                    <div class="form-group  col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" name="precio" id="precio-new-det" class="form-control" >
                                            <span class="input-group-addon">
                                        <a href="#" id="btn-add-det" data-loading-text="<i class='fa fa-cog fa-spin fa-1x fa-fw'></i>"  >
                                            <span class="text-success text-capitalize glyphicon glyphicon-plus"></span>
                                        </a>
                                    </span>
                                            <input type="hidden" name="temp_venta_id" value="{{$tempVenta->id}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Box busqueda--}}
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        {{--Box detalles--}}
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    <strong>
                                        Detalles
                                    </strong>
                                </h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    {{--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                                </div>
                            </div>
                            <!-- /.box-header -->


                            <div class="box-body" style="padding: 0px;">
                                <table width="100%"  class="table table-bordered table-condensed" id="tablaDetalle">
                                    <thead>
                                    <tr class="bg-primary txtzs txtwb" align="center">
                                        <td width="50%">Producto</td>
                                        <td width="10%">Precio</td>
                                        {{--<td width="10%">Código</td>--}}
                                        <td width="10%">Cantidad</td>
                                        <td width="10%">Subtotal</td>
                                        <td width="10%">-</td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php
                                        $subt =0;
                                        $total =0;
                                    @endphp

                                    @if($tempVenta->tempVentaDetalles->count() > 0)
                                        @foreach($tempVenta->tempVentaDetalles as $det)
                                            @php
                                                $subt =$det->cantidad*$det->precio;
                                            @endphp
                                            <tr >
                                                <td class="celda-descripcion">{{$det->item->nombre}}</td>
                                                <td class="celda-precio">{{'Q '.number_format($det->precio,2)}}</td>
                                                <td class="celda-cantidad">{{$det->cantidad}}</td>
                                                {{--<td class="celda-codigo">{{$det->item->codigo}}</td>--}}
                                                <td class="celda-subt">{{'Q '.number_format($subt,2)}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-danger btnEliminaDet" data-loading-text="<i class='fa fa-cog fa-spin fa-1x fa-fw'></i>" value="{{$det->id}}">
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                    </button>
                                                    <input type="hidden" name="cantidades[]" class="h-cantidad" value="{{$det->cantidad}}">
                                                    <input type="hidden" name="items[]" class="h-item" value="{{$det->item_id}}">
                                                    <input type="hidden" name="precios[]" class="h-precio" value="{{$det->precio}}">
                                                    {{--<input type="hidden" name="descuentos[]" class="h-descuento" value="{{$det->descuento}}">--}}
                                                    <input type="hidden" class="h-subt" value="{{$subt}}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr >
                                            <td class="celda-cantidad">0</td>
                                            {{--<td class="celda-codigo">0</td>--}}
                                            <td class="celda-descripcion">-</td>
                                            <td class="celda-precio">0</td>
                                            <td class="celda-subt">0</td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-danger btnEliminaDet" data-loading-text="<i class='fa fa-cog fa-spin fa-1x fa-fw'></i>" value="0" >
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                                <input type="hidden" name="cantidades[]" class="h-cantidad" value="" >
                                                <input type="hidden" name="items[]" class="h-item" value="">
                                                <input type="hidden" name="precios[]" class="h-precio" value="">
                                                {{--<input type="hidden" name="descuentos[]" class="h-descuento" value="">--}}
                                                <input type="hidden" class="h-subt" value="">
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="5" >
                                            Total
                                            <span class="pull-right" id="totalTexto">{{'Q '.number_format($total,2)}}</span>
                                        </td>
                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                        {{--/Box detalles--}}
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <strong>
                                Venta
                                <br><small> inicia: {{$tempVenta->created_at}}</small>
                            </strong>
                        </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            {{--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="padding: 0px;">

                        @include('ventas.fields')


                    </div>
                </div><!-- /.row -->
            </div>
        </div>
        {!! Form::close() !!}

    </div>

    @include('ventas.modal_cliente')
@endsection

@push('scripts')
<script>
    $(function() {

        function formatStateItems (state) {

            var $state = $(
                    "@component('components.format_slc2_item')"+
                    "@slot('imagen')"+state.imagen+ "@endslot"+
                    "@slot('nombre')"+state.nombre+ "@endslot"+
                    "@slot('descripcion')"+ state.descripcion+"@endslot"+
                    "@slot('um')"+ state.um+"@endslot"+
                    "@endcomponent"
            );

            return $state;
        };

        var slc2item=$("#items").select2({
            language : 'es',
//            closeOnSelect: false,
            ajax: {
                url: "{{ route('api.items.index') }}",
                dataType: 'json',
                data: function (params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data.data,
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            templateResult: formatStateItems,
            templateSelection: function(data,contenedor) {
                if(data.id === ''){
                    return 'Ingrese descripcion';
                }
                else{
                    $("#stock-actual").text(data.stock);
                    $("#precio-new-det").val(data.precio);
                    return data.nombre;
                }
            }
        }).on('select2:close', function (evt) {
            $("#cant-new-det").focus().select();
        });

        $("#btn-add-det").click(function (e) {

            e.preventDefault();

            var $btn = $(this).button('loading');
            var data = $('#datos-new-det :input').serializeArray();
            console.log('Envío de valores detalle por ajax');

            $.ajax({
                method: 'POST',
                url: '{{route("api.temp_venta_detalles.store")}}',
                data: data,
                dataType: 'json',
                success: function (res) {
                    var det= res.data;
                    console.log('respuesta ajax:',res)
                    if(res.success){
                        addDet(det.id,det.item_id,det.cantidad,det.item.nombre,det.precio);
                        bootstrap_alert(res.message,'success',3000);
                    }

                    $btn.button('reset');
                    slc2item.select2('open');
                },
                error: function (res) {
                    console.log('respuesta ajax:',res.responseJSON);

                    bootstrap_alert('<strong>Error! </strong>'+res.responseJSON.message,'danger',0);
                    $btn.button('reset');
                }
            })
        });

        $("#tablaDetalles").DataTable({
            responsive: true,
            searching: false,
            ordering:  false,
            paginate: false,
            info: false,
        });

        function addDet(idDet,item,cantidad,descripcion,precio) {

            cantidad= parseFloat(cantidad);
            precio= parseFloat(precio);

            var fila=$("#tablaDetalle tbody tr:last");
            var subTotal=(cantidad*precio).toFixed(2);
            var subTotalTexto="Q "+addComas(subTotal);
            var precioTexto= "Q "+addComas(precio.toFixed(2));

            //si el total es mayor a 0 esto dice que hay algun detalle existente
            if(total()>0){

                $("#tablaDetalle tbody tr:last").clone(true).appendTo($("#tablaDetalle tbody"));

                var fila=$("#tablaDetalle tbody tr:last");
            }

            fila.find(".celda-cantidad").text(cantidad)
            fila.find(".celda-descripcion").text(descripcion);
            fila.find(".celda-precio").text(precioTexto);
            fila.find(".celda-subt").text(subTotalTexto);

            fila.find(".h-item").val(item);
            fila.find(".h-cantidad").val(cantidad);
            fila.find(".h-precio").val(precio);
            fila.find(".h-subt").val(subTotal);
            fila.find(".btnEliminaDet").val(idDet);

            $("#cant-new-det").val(1);
            $("#precio-new-det").val(0);

            total();
            totalItems();
        }

        /*	Suma cada uno de los subtotales
         ------------------------------------------------*/
        function total(){

            var Total=0,totalTexto;

            $(".h-subt").each(function() {
                var cant=parseFloat($(this).val());
                //suma del valor de cada uno de los subtotales
                if(!isNaN(cant)){
                    Total+=cant;
                }
            });

            totalTexto="Q "+addComas(Total.toFixed(2));
            $("#h-total").val(Total.toFixed(2));
            $("#totalTexto").text(totalTexto);
            $("#total-venta").text(totalTexto);

            return Total;
        }

        total();

        /*	Suma cada una de las cantidades
         ------------------------------------------------*/
        function totalItems(){

            var Total=0,totalTexto;

            $(".h-cantidad").each(function() {
                var cant=parseFloat($(this).val());
                //suma del valor de cada uno de los subtotales
                if(!isNaN(cant)){
                    Total+=cant;
                }
            });

            $("#num-items").text(Total.toFixed(2));

            return Total;
        }

        totalItems();

        /*	Remueve las filas detalle validando si solo queda una fila (no se remueve, solo se borran sus campos)
         --------------------------------------------------------------------------------------------------------*/
        $.fn.removerFila=function(){
            if($('#tablaDetalle >tbody >tr').length==1){
                $(this).find(".celda-cantidad").text(0)
                $(this).find(".celda-descripcion").text('-');
                $(this).find(".celda-precio").text(0);
                $(this).find(".celda-subt").text(0);

                $(this).find(".h-item").val('');
                $(this).find(".h-cantidad").val(0);
                $(this).find(".h-precio").val(0);
                $(this).find(".h-subt").val(0);
            }else{
                $(this).remove();
            }

            total();
            totalItems();
        };

        /* 						   REMOVER DETALLES
         --------------------------------------------------------------------------------------*/
        $(".btnEliminaDet").click(function(){

            var fila=$(this).closest('tr');
            var id= parseInt($(this).val());

            console.log('eliminar detalle: ' + id)

            if(id){
                var $btn= $(this).button('loading');

                $.ajax({
                    method: 'DELETE',
                    url: '{{url('api/temp_venta_detalles')}}' + '/' + id,
                    dataType: 'json',
                    success: function (res) {
                        ///res = JSON.parse(res);
                        console.log('respuesta ajax:',res);

                        bootstrap_alert('<strong>Listo! </strong>'+res.message,'success',5);
                        $btn.button('reset');
                        fila.removerFila();
                    },
                    error: function (res) {
                        console.log('respuesta ajax:',res.responseJSON);

                        bootstrap_alert('<strong>Error! </strong>'+res.responseJSON.message,'danger',5);
                        $btn.button('reset');
                    }
                })
            }

        });

    })
</script>
@endpush
