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
                   {!! Form::model($fcategoria, ['route' => ['fcategorias.update', $fcategoria->id], 'method' => 'patch']) !!}

                        @include('fcategorias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection