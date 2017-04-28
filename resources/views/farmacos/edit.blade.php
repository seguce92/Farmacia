@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Farmaco
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($farmaco, ['route' => ['farmacos.update', $farmaco->id], 'method' => 'patch']) !!}

                        @include('farmacos.fields')

                   <!-- Submit Field -->
                       <div class="form-group col-sm-12">
                           {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                           <a href="{!! route('farmacos.index') !!}" class="btn btn-default">Cancel</a>
                       </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection