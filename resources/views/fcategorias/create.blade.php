@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Fcategoria
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'fcategorias.store']) !!}

                        @include('fcategorias.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
