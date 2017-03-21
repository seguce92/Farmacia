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
                <div class="row" style="padding-left: 20px">
                    <div class="col-sm-6">
                        <img src="{{url("images/".$item->imagen)}}" class="img-responsive" alt="Image">
                    </div>
                    <div class="col-sm-6">

                       @include('items.show_fields')
                   </div>

                    <a href="{!! route('items.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
