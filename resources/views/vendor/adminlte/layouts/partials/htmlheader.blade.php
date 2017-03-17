<head>
    <meta charset="UTF-8">
    <title> @yield('htmlheader_title', 'SysBase') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />--}}


    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset("/css/skins/_all-skins.min.css")}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("/css/font-awesome.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset("css/ionicons.min.css")}}">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">--}}
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset("/css/bootstrap.min.css")}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset("plugins/iCheck/square/blue.css")}}">
    <!--Data tables-->
    <link rel="stylesheet" href="{{asset('plugins/DataTables/datatables.min.css')}}">

    <!-- Morris chart -->
    {{--<link rel="stylesheet" href="{{asset("plugins/morris/morris.css")}}">--}}
    <!-- jvectormap -->
    {{--<link rel="stylesheet" href="{{asset("plugins/jvectormap/jquery-jvectormap-1.2.2.css")}}">--}}
    <!-- Date Picker -->
    {{--<link rel="stylesheet" href="{{asset("plugins/datepicker/datepicker3.css")}}">--}}
    <!-- Daterange picker -->
    {{--<link rel="stylesheet" href="{{asset("plugins/daterangepicker/daterangepicker.css")}}">--}}
    <!-- bootstrap wysihtml5 - text editor -->
    {{--<link rel="stylesheet" href="{{asset("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">--}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--App css-->
    @stack('css')
    {{ $css or ''}}

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <script>
        //See https://laracasts.com/discuss/channels/vue/use-trans-in-vuejs
        window.trans = @php
            // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
            $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
            $trans = [];
            foreach ($lang_files as $f) {
                $filename = pathinfo($f)['filename'];
                $trans[$filename] = trans($filename);
            }
            $trans['adminlte_lang_message'] = trans('adminlte_lang::message');
            echo json_encode($trans);
        @endphp
    </script>
</head>
