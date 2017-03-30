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
                   <!-- Submit Field -->
                       <div class="form-group col-sm-12">
                           {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                           <a href="{!! route('proveedores.index') !!}" class="btn btn-default">Cancel</a>
                       </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection