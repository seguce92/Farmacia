@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Proveedor
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($proveedor, ['route' => ['proveedores.update', $proveedor->id], 'method' => 'patch']) !!}

                        @include('proveedores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection