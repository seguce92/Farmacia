@extends('adminlte::layouts.app')

@push('css')
<style>
    .table-xtra-condensed > thead > tr > th,
    .table-xtra-condensed > tbody > tr > th,
    .table-xtra-condensed > tfoot > tr > th,
    .table-xtra-condensed > thead > tr > td,
    .table-xtra-condensed > tbody > tr > td,
    .table-xtra-condensed > tfoot > tr > td {
        padding: 2px;
    }
</style>
@endpush
@section('content')
    {{--<section class="content-header">--}}
        {{--<h1>--}}
            {{--Venta--}}
        {{--</h1>--}}
    {{--</section>--}}
    <div class="content">
        @include('adminlte-templates::common.errors')

        {!! Form::open(['route' => 'ventas.store']) !!}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <strong>
                        Venta <small>datos generales</small>
                    </strong>
                </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    {{--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('ventas.fields')
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
                    <div class="box-body">
                        <div class="form-group">
                                <select name="name" id="items" class="form-control">
                                    <option value=""> -- Select One -- </option>
                                </select>
                        </div>
                        <section class="content">
                            Datos
                        </section>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Cant</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="1">
                                </div>
                            </div>
                            <div class="form-group  col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-addon">
                                <a class="" href="#" ><span class="text-success glyphicon glyphicon-plus"></span></a>
                            </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <strong>
                                Detalles
                            </strong>
                        </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <table width="100%"  class="table table-bordered table-xtra-condensed" id="tablaDetalles">
                            <thead>
                            <tr class="bg-primary txtzs txtwb" align="center">
                                <td width="10%">Cantidad</td>
                                <td width="10%">Código</td>
                                <td width="50%">Descripci&oacute;n</td>
                                <td width="10%">Precio</td>
                                <td width="10%">Subtotal</td>
                                <td width="10%">-</td>
                            </tr>
                            </thead>

                            <tbody>

                            <tr class="fila">
                                <td>5</td>
                                <td>123</td>
                                <td>Panadol extra fuerte</td>
                                <td>2.5</td>
                                <td>12.5</td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-danger btnEliminaDet">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>


                <div class="form-group col-sm-12">
                </div>

        {!! Form::close() !!}
    </div>


    @include('ventas.modal_cliente')
@endsection
@push('scripts')
<script>
    $(function () {
        $("#tablaDetalles").DataTable({
            responsive: true,
            searching: false,
            ordering:  false,
            paginate: false,

        });
    })
</script>
@endpush
