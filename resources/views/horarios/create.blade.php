@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Horario
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'horarios.store']) !!}

                        @include('horarios.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
