@extends('adminlte::layouts.app')

@push('css')
<style>
    #tablaDetalle2 input[type=text],
    #tablaDetalle input[type=text]{
        height: 21px;
        padding: 2px 5px;
        line-height: 1.5;
        border: none;
        border-radius: 0px;
    }
    .table{
        margin-bottom: 2px;
    }
    .table-xtra-condensed > thead > tr > th,
    .table-xtra-condensed > tbody > tr > th,
    .table-xtra-condensed > tfoot > tr > th,
    .table-xtra-condensed > thead > tr > td,
    .table-xtra-condensed > tbody > tr > td,
    .table-xtra-condensed > tfoot > tr > td {
        padding: 2px;
    }
    .format-select-item{
        padding: 0px;
        margin: 0px;
        font-size: small;
    }
</style>
@endpush
@section('content')
    <section class="content-header">
        <h1>
            Compra
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'compras.store']) !!}

                        @include('compras.fields')


                        <div class="col-sm-12">
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table table-bordered table-xtra-condensed" id="tablaDetalle">
                                <thead>
                                <tr class="bg-primary txtzs txtwb" align="center">
                                    <td >Cantidad</td>
                                    <td >Código</td>
                                    <td >Descripci&oacute;n</td>
                                    <td >Precio</td>
                                    <td >Subtotal</td>
                                    <td >-</td>
                                </tr>
                                </thead>

                                <tbody>

                                <tr class="fila">
                                    <td><input type="text" name="cantidades[]" class="form-control txtzxs  cantidad numero" value="0" size="3"/></td>
                                    <td><input type="text" class="form-control txtzxs  codigo " value=""  size="3" readonly/></td>
                                    <td><select name="items[]" class="form-control items" style="width: 100%"></select></td>
                                    <td><input type="text" name="precios[]" class="form-control txtzxs  precio numero" value="0" size="5" /></td>
                                    <td><input type="text" class="form-control txtzxs numero rSubTotal" value="0" size="5" readonly="readonly" /></td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-danger btnEliminaDet">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                        <input type="hidden" name="detalles[]" value="" />
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                            <div class="form-group ">
                                    <span class="pull-left">
                                        <button id="btnNewDet" type="button" class="btn btn-xs btn-info">A&ntilde;adir Nuevo Detalle</button>
                                    </span>

                                <span class="pull-right">
                                    <input type="hidden" id="sumaTotal" value=""/>
                                    <strong class="txtzl">Total</strong>
                                    <span class="txtzl txtwb" id="totalTexto"></span>
                                </span>
                            </div>
                            <br>
                            <br>

                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{!! route('compras.index') !!}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>



                        <!-- Submit Field -->


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@include('items.def_select2')
<script>
    $(function() {

        var debug=true;

        /**
         * Recorre cada uno de los camps detalles y devuelve falso si uno de ellos no tiene valor o su valor es 0
         * @returns {boolean}
         */
        function camposLLenos(){
            var i=0;
            //Recorre cada campo tipo texto de la tabla detalle
            $("#tablaDetalle tbody").find("input:text").each(function() {
                if($(this).val()=="" || $(this).val()==0){
                    i++;
                }
            });

            return i==0 ? true : false;
        }

        /**
         * si todos los campos detalle estan llenos puede guardar o agregar otro detalle
         */
        function validaGuardaYnuevoDet(){
            consola("Valida guarda y nuevo detalle",debug);
            if(camposLLenos()){
                $("#btnNewDet,#btnSubmit,#btnSubmit2,#btnFinalizar,#btnPreingreso").attr("disabled",false);
            }else{
                $("#btnNewDet,#btnSubmit,#btnSubmit2,#btnFinalizar,#btnPreingreso").attr("disabled",true);
            }
        }


        /*	Suma cada uno de los subtotales
         ------------------------------------------------*/
        function total(){
            var Total=0,totalTexto;

            $(".rSubTotal").each(function() {
                var cant=parseFloat($(this).val());
                //suma del valor de cada uno de los subtotales
                if(!isNaN(cant)){
                    Total+=cant;
                }
            });

            totalTexto="Q "+addComas(Total.toFixed(2));
            $("#sumaTotal").val(Total.toFixed(2));
            $("#totalTexto").text(totalTexto);
        }

        /*Multiplica la cantidad y el precio de la fila que se le manda como parametrom y lo coloca en el campo subtotal de la misma fila
         ----------------------------------------------------------------------------------------------------------------------------------*/
        function subTotal(fila){
            var sTotal=0;
            var cantidad=parseFloat(fila.find(".cantidad").val());
            var precio=parseFloat(fila.find(".precio").val());

            if(!isNaN(precio) && !isNaN(cantidad)){
                sTotal=cantidad*precio;
                fila.find(".rSubTotal").val( sTotal.toFixed(5) );
                total();
            }
            validaGuardaYnuevoDet();
        }


        function ajustarDecimales(){
//            consola("Ajusta decimales",debug);
            $(".numero").each(function() {
                $(this).val(parseFloat($(this).val()).toFixed(2));
            });
        }

        /*	Remueve las filas detalle validando si solo queda una fila (no se remueve, solo se borran sus campos)
         --------------------------------------------------------------------------------------------------------*/
        $.fn.removerFila=function(){
            if($('#tablaDetalle >tbody >tr').length==1){
                $(this).find("input").val("");
                $(this).find(".numero").val(0);
                $(this).find(".lbl-perecedero").hide();
            }else{
                $(this).remove();
            }
            ajustarDecimales();
            validaFinalizar();
        };

        $(".items").defSelect2();

        $(".numero").keypress(function(e) {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 0) || (keynum == 13) || (keynum == 46)){
                return true;
            }
            return /\d/.test(String.fromCharCode(keynum));
        });

        $(".codigo").focus(function() {
            $(this).select();
        });
        $(".cantidad,.precio").focus(function() {
            $(this).select();
        });



        /*Cada vez que se ingrese un dato en los campos cantidad o precio
         -----------------------------------------------------------------*/
        $(".cantidad,.precio").keyup(function() {
            var fila=$(this).parent().parent();
            subTotal(fila);
        }).blur(function() {
            var fila=$(this).parent().parent();
            subTotal(fila);
        });

        /* 							AGREGAR DETALLES
         --------------------------------------------------------------------------------------*/
        function addDet() {
            $("#tablaDetalle tbody tr:last").clone(true).appendTo($("#tablaDetalle tbody"));

            var filaClon=$("#tablaDetalle tbody tr:last");
            filaClon.find(".items").parent().html("<select name='items[]' class='form-control items' style='width: 100%'></select>");
            filaClon.find(".items").defSelect2();
            filaClon.find("input").val("");
            filaClon.find(".numero").val(0);
            //filaClon.find(".lbl-perecedero").hide();

            ajustarDecimales();

            filaClon.find(".cantidad").focus().select();
        }

        $("#btnNewDet").click(function(){
            addDet();
        });

        /**
         * Para cundo precione tabular despues de ingresar el precio agrege otro detalle*/
        $(".precio").keydown(function(e) {
            var code = e.keyCode || e.which;
            //si la tecla precionada es tab
            if (code == '9') {
                console.log("Tecla tab precionada");
                // y si todos los campos estan llenos
                if(camposLLenos()){
                    e.preventDefault();
                    addDet();
                }
            }
        })

        /* 						   REMOVER DETALLES
         --------------------------------------------------------------------------------------*/
        $(".btnEliminaDet").click(function(){
            var fila=$(this).parent().parent();
            var idRegistro=$(this).next("input:hidden").val();

            if(idRegistro){
                $.get("{{route('api.compra_detalles.destroy',['method'=>"delete",'id'=>'"+idRegistro+"'])}}",{},function(respuesta){

                });
            }else{
                fila.removerFila();
            }

            $("#tablaDetalle tbody tr:last").find(".cantidad").focus().select();
        });

        ajustarDecimales();
        validaGuardaYnuevoDet();
        total();
    })
</script>
@endpush
