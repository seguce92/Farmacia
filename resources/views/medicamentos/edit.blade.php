@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Medicamento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($medicamento, ['route' => ['medicamentos.update', $medicamento->id], 'method' => 'patch']) !!}

                        @include('medicamentos.fields')


                        <!-- Submit Field -->
                       <div class="form-group col-sm-12">
                           {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                           <a href="{!! route('medicamentos.index') !!}" class="btn btn-default">Cancel</a>
                       </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection