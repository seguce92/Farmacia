@component('adminlte::layouts.app')


    @component('components.box')
        @slot('boxTitle')
        Editar Rol
        @endslot

        {!! Form::model($rol, ['route' => ['rols.update', $rol->id], 'method' => 'patch']) !!}
            @include('admin.rols.campos')
        {!! Form::close() !!}
    @endcomponent

@endcomponent