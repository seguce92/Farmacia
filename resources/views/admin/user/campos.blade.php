@push('css')
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
@endpush

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Nombre</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name or ''}}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label for="username" class="col-md-2 control-label">Usuario</label>

    <div class="col-md-6">
        <input id="username" type="text" class="form-control" name="username" value="{{ $user->username or '' }}" required autofocus>

        @if ($errors->has('username'))
            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Correo</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email or ''}}" required>

        @if ($errors->has('email'))
            <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('rols') ? ' has-error' : '' }}">
    <label for="rols" class="col-sm-2 control-label">Roles</label>
    <div class="col-sm-6">
        <select name="rols[]" id="rols" class="form-control" multiple="multiple">
            <option value=""> -- Select One -- </option>
            @foreach($rols as $rol)
                <option value="{{$rol->id}}" {{in_array($rol->id,$rolsUser) ? "selected" : ""}}>{{$rol->descripcion}}</option>
            @endforeach
        </select>
        @if ($errors->has('rols'))
            <span class="help-block"><strong>{{ $errors->first('rols') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Contraseña</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <label for="password-confirm" class="col-md-2 control-label">Confirmar Contraseña</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-2">
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>

        <a href="{{ action("AdminUserControler@index")  }}">

            <button type="button" class="btn btn-default">
                Regrear
            </button>
        </a>
    </div>
</div>

@push('scripts')
    <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            $("#rols").select2();
//            $.fn.select2.defaults.set("administrador", "usuario");
        })
    </script>
@endpush