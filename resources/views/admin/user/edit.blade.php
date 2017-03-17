@component('adminlte::layouts.app')


    @component('components.box')
        @slot('boxTitle')
        Editar Usuario
        @endslot

        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch',"class" => 'form-horizontal']) !!}
            @include('admin.user.campos')
        {!! Form::close() !!}
    @endcomponent

@endcomponent