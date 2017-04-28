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
            Editar Artículo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">

                   {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'patch',"enctype"=>"multipart/form-data"]) !!}
                        <div class="row">
                        @include('items.fields')
                        </div>
                        @if($item->esMedicamento() && $medicamento)
                       <div class="collapse in" id="div-datos-medicamentos">
                           <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                   <div class="panel panel-info">
                                       <div class="panel-heading">
                                           <h3 class="panel-title">Datos del medicamento </h3>
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
                        @endif

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