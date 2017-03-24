@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vestado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vestado, ['route' => ['vestados.update', $vestado->id], 'method' => 'patch']) !!}

                        @include('vestados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection