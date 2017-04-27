@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Item
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" >
                    <div class="col-sm-6" align="center">
                        @if($item->imagen)
                            <img src="{{asset($item->imagen)}}" class="img-responsive" alt="Image">
                        @else
                            <img src="{{asset('img/avatar_none.png')}}" class="img-responsive" alt="Image" width="400px" height="400px">
                        @endif
                    </div>
                    <div class="col-sm-6">

                       @include('items.show_fields')
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <a href="{!! route('items.index') !!}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
