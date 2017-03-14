@component('adminlte::layouts.app')


    @component('components.box')
        @slot('boxTitle')
            Crear nuevo rol
        @endslot

        {!! Form::open(['route' => 'rols.store']) !!}

            @include('admin.rols.campos')
        {!! Form::close() !!}
    @endcomponent

@endcomponent