@extends('adminlte::layouts.app')

@push('css')
@include('layouts.select2_css')
@include('layouts.plugins.datepiker_css')
@endpush

@push('scripts')
@include('layouts.select2_js')
@include('layouts.plugins.datepiker_js')
@endpush


@include('layouts.xtra_condensed_css')
@include('layouts.plugins.fancy_box')
@include('layouts.bootstrap_alert_float')

@section('content')

    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')

        {!! Form::model($tempCompra, ['route' => ['compras.update', $tempCompra->id], 'method' => 'patch']) !!}
        <div class="row">
            <!--Pestañas-->
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <!-- TAB NAVIGATION -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Artículos</a></li>
                    <li><a href="#tab2" role="tab" data-toggle="tab">Detalles</a></li>
                </ul>
                <!-- TAB CONTENT -->
                <div class="tab-content">

                    <!--Tab busqueda-->
                    <div class="active tab-pane fade in" id="tab1">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <strong>
                                    <label for="buscar_por" class="col-sm-3 control-label"><h3 class="box-title">Busqueda por:</h3></label>
                                    <div class="col-sm-9">
                                        <select name="buscar_por" id="buscar_por" class="form-control">
                                            <option value="nombre"> Nombre </option>
                                            <option value="contiene"> Componentes </option>
                                            <option value="indicaciones"> Indicaciones </option>
                                            <option value="todo"> Todo </option>
                                        </select>
                                    </div>
                                </strong>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" id="datos-new-det">

                                <div class="form-group">
                                    <select name="item_id" id="items" class="form-control" multiple="multiple" size="10" style="width: 100%;">
                                        <option value=""> -- Select One -- </option>
                                    </select>
                                </div>
                                <div id="div-info-item">

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
                                            <span class="input-group-addon">Q</span>
                                            <input type="text" name="precio" id="precio-new-det" class="form-control" placeholder="Precio compra" data-toggle="tooltip" title="Doble Enter para agregar">
                                            <span class="input-group-btn">
                                                <button type="button" id="btn-add-det" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-1x fa-fw'></i> Agregando" >
                                                    <span class="glyphicon glyphicon-plus"></span> Agregar
                                                </button>
                                            </span>
                                        </div><!-- /input-group -->

                                        <input type="hidden" name="temp_compra_id" value="{{$tempCompra->id}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Tab busqueda-->

                    <!--Tab detalles-->
                    <div class="tab-pane fade" id="tab2">
                        <div class="box box-success">
                            <div class="box-body" style="padding: 0px;">
                                @include('components.tabla_item_detalles', ['detalles' => $tempCompra->tempCompraDetalles])
                            </div>
                        </div>
                    </div>
                    <!--/Tab detalles-->
                </div>

            </div>
            <!--/Pestañas-->


            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <strong>
                                Compra <small>inicia: {{$tempCompra->created_at}}</small>
                            </strong>
                        </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" tabindex="1000"><i class="fa fa-minus"></i></button>
                            {{--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="padding: 0px;">

                        @include('compras.fields')

                    </div>
                </div><!-- /.row -->
            </div>
        </div>
        {!! Form::close() !!}

    </div>

    @include('compras.modal_provs')

@endsection

@push('scripts')

<!--*********** Scripts create compras ***********-->
<script>
    $(function() {

        function formatStateItems (state) {

            var imagen= state.imagen==undefined ? 'img/avatar_none.png' : state.imagen;

            var $state = $(
                "@component('components.format_slc2_item')"+
                "@slot('imagen')"+imagen+ "@endslot"+
                "@slot('nombre')"+state.nombre+ "@endslot"+
                "@slot('descripcion')"+ state.descripcion+"@endslot"+
                "@slot('contiene')"+ state.contiene+"@endslot"+
                "@slot('um')"+ state.um+"@endslot"+
                "@slot('laboratorio')"+ state.laboratorio+"@endslot"+
                "@slot('precio')"+state.precio+"@endslot"+
                "@slot('ubicacion')"+state.ubicacion+"@endslot"+
                "@slot('stock')"+state.stock+"@endslot"+
                "@endcomponent"
            );

            return $state;
        };

        var slc2item=$("#items").select2({
            language : 'es',
            maximumSelectionLength: 1,
            placeholder: "Ingrese código,nombre o componente para la búsqueda",
            delay: 250,
            ajax: {
                url: "{{ route('api.item_medicamentos.index') }}",
                dataType: 'json',
                data: function (params) {
                    var buscarPor= $('#buscar_por').val();

                    return {
                        search: params.term,
                        buscar_por: buscarPor,
                    };
                },
                processResults: function (data, params) {
                    //recorre todos los item q
                    var data = $.map(data.data, function (item) {

                        //recorre los atributos del item
                        $.each(item,function (index,valor) {
                            //Si no existe valor se asigan un '-' al attributo
                            item[index] = !valor ? '-' : valor;
                        });

                        return item;
                    });

                    return {
                        results: data,
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            templateResult: formatStateItems,
            templateSelection: function(data,contenedor) {
                $("#div-info-item").html(
                        "@component('components.items.show_bar')"+
                        "@slot('imagen')"+data.imagen+ "@endslot"+
                        "@slot('laboratorio')"+ data.laboratorio+"@endslot"+
                        "@slot('descripcion')"+ data.descripcion+"@endslot"+
                        "@slot('precio')"+data.precio+"@endslot"+
                        "@slot('ubicacion')"+data.ubicacion+"@endslot"+
                        "@slot('stock')"+data.stock+"@endslot"+
                        "@slot('contiene')"+ data.contiene+"@endslot"+
                        "@slot('um')"+ data.um+"@endslot"+
                        "@slot('indicaciones')"+ data.indicaciones+"@endslot"+
                        "@slot('contraindicaciones')"+ data.contraindicaciones+"@endslot"+
                        "@slot('advertencias')"+ data.advertencias+"@endslot"+
                        "@endcomponent"
                );

                return data.nombre;
            }
        }).on('select2:unselecting',function (e) {
            $("#div-info-item").html('');
        })

        $("#btn-add-det").click(function (e) {

            e.preventDefault();

            var $btn = $(this).button('loading');
            var data = $('#datos-new-det :input').serializeArray();
            console.log('Envío de valores detalle por ajax');

            $.ajax({
                method: 'POST',
                url: '{{route("api.temp_compra_detalles.store")}}',
                data: data,
                dataType: 'json',
                success: function (res) {
                    console.log('respuesta ajax:',res)

                    var det= res.data;
                    //si es medicamento agrega el laboratorio  a la descripcion o nombre del item
                    var descrip = det.item.medicamento ? det.item.nombre+" / "+det.item.medicamento.laboratorio.nombre : det.item.nombre;

                    if(res.success){
                        addDet(det.id,det.item_id,det.cantidad,descrip,det.precio);
                        bootstrap_alert(res.message,'success',3000);
                    }

                    $btn.button('reset');
                    slc2item.empty().trigger('change');
                    slc2item.select2('open');
                    $("#div-info-item").html('');
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

            total();
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

            if(Total>0){
                $("#btn-procesar").attr('disabled',false)
            }else{
                $("#btn-procesar").attr('disabled',true)
            }
            return Total;
        }

        total();

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
                    url: '{{url('api/temp_compra_detalles')}}' + '/' + id,
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

        $("#precio-new-det").keypress(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                $("#btn-add-det").focus();
            }
        });

    })
</script>
@endpush
