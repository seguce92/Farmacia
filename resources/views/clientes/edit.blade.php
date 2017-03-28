@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cliente
        </h1>
   </section>
   <section class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cliente, ['route' => ['clientes.update', $cliente->id], 'method' => 'patch']) !!}

                        @include('clientes.fields')

                   <!-- Submit Field -->
                       <div class="form-group col-sm-12">
                           {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                           <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancel</a>
                       </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </section>
@endsection