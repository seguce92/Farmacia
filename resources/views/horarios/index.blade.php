@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Horarios</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('horarios.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                {!! $dataTable->table(['width' => '100%']) !!}
            </div>
        </div>
    </div>
@endsection
@include('layouts.script_dt')

