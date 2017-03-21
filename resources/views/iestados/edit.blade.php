@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Iestado
        </h1>
   </section>
   <div class="content">

       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($iestado, ['route' => ['iestados.update', $iestado->id], 'method' => 'patch']) !!}

                        @include('iestados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection