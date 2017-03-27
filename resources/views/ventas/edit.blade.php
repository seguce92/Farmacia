@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Venta
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($venta, ['route' => ['ventas.update', $venta->id], 'method' => 'patch']) !!}

                        @include('ventas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection