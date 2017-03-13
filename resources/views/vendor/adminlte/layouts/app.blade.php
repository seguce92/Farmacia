<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div id="app">
    <div class="wrapper">

        @include('adminlte::layouts.partials.mainheader')

        @include('adminlte::layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            {{--@include('adminlte::layouts.partials.contentheader')--}}


            <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success" id="alerta-master">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{session('status')}}
                    </div>
                @endif

                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        {{--@include('adminlte::layouts.partials.controlsidebar')--}}

        @include('adminlte::layouts.partials.footer')

    </div><!-- ./wrapper -->
</div>

<!-- jQuery 2.2.3 -->
<script src="{{asset("plugins/jQuery/jquery-2.2.3.min.js")}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/DataTables/datatables.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset("plugins/jQueryUI/jquery-ui.min.js")}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.6 -->
<script src="{{asset("/js/bootstrap.min.js")}}"></script>

<!-- Morris.js charts -->
{{--<script src="{{asset("https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js")}}"></script>--}}
{{--<script src="{{asset("plugins/morris/morris.min.js")}}"></script>--}}
<!-- Sparkline -->
{{--<script src="{{asset("plugins/sparkline/jquery.sparkline.min.js")}}"></script>--}}
<!-- jvectormap -->
{{--<script src="{{asset("plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>--}}
{{--<script src="{{asset("plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>--}}
<!-- jQuery Knob Chart -->
{{--<script src="{{asset("plugins/knob/jquery.knob.js")}}"></script>--}}
<!-- daterangepicker -->
{{--<script src="{{asset("https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js")}}"></script>--}}
{{--<script src="{{asset("plugins/daterangepicker/daterangepicker.js")}}"></script>--}}
<!-- datepicker -->
{{--<script src="{{asset("plugins/datepicker/bootstrap-datepicker.js")}}"></script>--}}
<!-- Bootstrap WYSIHTML5 -->
{{--<script src="{{asset("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>--}}
<!-- Slimscroll -->
{{--<script src="{{asset("plugins/slimScroll/jquery.slimscroll.min.js")}}"></script>--}}
<!-- FastClick -->
{{--<script src="{{asset("plugins/fastclick/fastclick.js")}}"></script>--}}

<!-- AdminLTE App -->
<script src="{{asset("js/app.min.js")}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{asset("js/pages/dashboard.js")}}"></script>--}}
<!-- AdminLTE for demo purposes -->
{{--<script src="{{asset("js/demo.js")}}"></script>--}}

<!-- App scripts -->
@stack('scripts')
@section('scripts')
    {{--@include('adminlte::layouts.partials.scripts')--}}
@show

</body>
</html>
