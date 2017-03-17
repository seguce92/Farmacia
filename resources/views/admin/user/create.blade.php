@component('adminlte::layouts.app')


    @component('components.box')
        @slot('boxTitle')
        Crear nuevo Usuario
        @endslot

        {!! Form::open(['route' => 'register',"class" => "form-horizontal"]) !!}

            @include('admin.user.campos')
        {!! Form::close() !!}
    @endcomponent

@endcomponent