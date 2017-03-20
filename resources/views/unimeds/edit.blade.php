@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Unimed
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($unimed, ['route' => ['unimeds.update', $unimed->id], 'method' => 'patch']) !!}

                        @include('unimeds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection