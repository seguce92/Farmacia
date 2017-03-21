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
                <div class="row">
                    {!! Form::open(['route' => 'items.store',"enctype"=>"multipart/form-data"]) !!}

                        @include('items.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
