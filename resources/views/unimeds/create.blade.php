@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Unimed
        </h1>
    </section>
    <div class="content">

        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'unimeds.store']) !!}

                        @include('unimeds.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
