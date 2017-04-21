@extends('adminlte::layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Ventas Hoy </span>
                    <span class="info-box-number">Q {{number_format($totalDia,2)}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ventas por hora hoy {{diaLetras(\Carbon\Carbon::now()->dayOfWeek)}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="grafica-ventas-dia" style="width:100%; height:100%;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>





        <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ventas diarias de {{ucfirst(\Carbon\Carbon::now()->formatLocalized('%B'))}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="grafica-ventas-mes" style="width:100%; height:100%;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ventas mensuales de {{\Carbon\Carbon::now('America/Guatemala')->format('Y')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="grafica-ventas-anio" style="width:100%; height:100%;"></div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection
@push('scripts')
<script src="{{asset('plugins/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('js/highcharts.js')}}"></script>
<script>
    $(function () {

        var optionsDia={
            chart: {
                renderTo: 'grafica-ventas-dia',
            },
            title: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            subtitle: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                categories: [],
                title: {
                    text: 'dias del mes'
                },
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    style: {
                        display: 'none'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'monto',
                data: []
            }]
        }

        $.ajax({
            method: 'GET',
            url: '{{url('graficas/ventas/dia')}}',
            dataType: 'json',
            success: function (res) {
                ///res = JSON.parse(res);
                console.log('respuesta ajax:',res);
                var i=0;
                var monto=0;
                for(i=res.horaini;i<=res.horafin;i++){
                    monto= parseFloat(res.datos[i]);
                    optionsDia.series[0].data.push(monto);
                    optionsDia.xAxis.categories.push(i+':00');

                }

                chart = new Highcharts.Chart(optionsDia);

            },
            error: function (res) {
                console.log('respuesta ajax:',res);

            }
        })

        var optionsMes={
            chart: {
                renderTo: 'grafica-ventas-mes',
                type: 'column'
            },
            title: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            subtitle: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                categories: [],
                title: {
                    text: 'dias del mes'
                },
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    style: {
                        display: 'none'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'monto',
                data: []
            }]
        }

        $.ajax({
            method: 'GET',
            url: '{{url('graficas/ventas/mes')}}',
            dataType: 'json',
            success: function (res) {
                ///res = JSON.parse(res);
                console.log('respuesta ajax:',res);
                var i=0;
                var monto=0;
                for(i=1;i<=res.diasmes;i++){
                    monto = parseFloat(res.datos[i]);
                    optionsMes.series[0].data.push(monto);
                    optionsMes.xAxis.categories.push(i);

                }

                chart = new Highcharts.Chart(optionsMes);

            },
            error: function (res) {
                console.log('respuesta ajax:',res);

            }
        })

        var optionsAnio={
            chart: {
                renderTo: 'grafica-ventas-anio',
                type: 'column'
            },
            title: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            subtitle: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                categories: [],
                title: {
                    text: 'dias del mes'
                },
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    style: {
                        display: 'none'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'monto',
                data: []
            }]
        }

        $.ajax({
            method: 'GET',
            url: '{{url('graficas/ventas/anio')}}',
            dataType: 'json',
            success: function (res) {
                ///res = JSON.parse(res);
                console.log('respuesta ajax:',res);

                var meses =['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
                var i=0;
                var monto=0;
                for(i=1;i<=12;i++){
                    monto = parseFloat(res.datos[i]);
                    optionsAnio.series[0].data.push(monto);
                    optionsAnio.xAxis.categories.push(meses[i-1]);

                }

                chart = new Highcharts.Chart(optionsAnio);

            },
            error: function (res) {
                console.log('respuesta ajax:',res);

            }
        })

  });
</script>
@endpush