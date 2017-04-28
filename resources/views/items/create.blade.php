@extends('adminlte::layouts.app')

@push('css')
@include('layouts.select2_css')
@endpush
@push('scripts')
@include('layouts.select2_js')
@endpush
@section('content')
    <section class="content-header">
        <h1>
            Nuevo Artículo
        </h1>
    </section>
    <div class="content">

        <div class="box box-primary">
            @include('adminlte-templates::common.errors')
            <div class="box-body">
                    {!! Form::open(['route' => 'items.store',"enctype"=>"multipart/form-data"]) !!}
                        <div class="row">

                        @include('items.fields')
                        </div>

                        <div class="collapse" id="div-datos-medicamentos">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Datos del medicamento
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                @include('items.fields_medicamentos')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{!! route('items.index') !!}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
