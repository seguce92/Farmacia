@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Icategoria
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($icategoria, ['route' => ['icategorias.update', $icategoria->id], 'method' => 'patch']) !!}

                        @include('icategorias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection