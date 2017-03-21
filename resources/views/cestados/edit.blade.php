@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cestado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cestado, ['route' => ['cestados.update', $cestado->id], 'method' => 'patch']) !!}

                        @include('cestados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection