@push('css')
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
@endpush

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control',"rows"=>2]) !!}
</div>

<!-- Categorias Field -->
<div class="form-group{{ $errors->has('cats') ? ' has-error' : '' }} col-sm-6">
    <label for="cats" class="col-sm-2 control-label">Categorias</label>

    <select name="categorias[]" id="categorias" class="form-control" multiple="multiple">
        <option value=""> -- Select One -- </option>
        @foreach($cats as $cat)

            @if(old('categorias'))
                <option value="{{$cat->id}}" {{ in_array($cat->id,old('categorias')) ? "selected" : ""}}>{{$cat->nombre}}</option>
            @else
                <option value="{{$cat->id}}" {{ in_array($cat->id,$catsItem) ? "selected" : ""}}>{{$cat->nombre}}</option>
            @endif
        @endforeach
    </select>
    @if ($errors->has('cats'))
        <span class="help-block"><strong>{{ $errors->first('cats') }}</strong></span>
    @endif
</div>

<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::text('precio', null, ['class' => 'form-control',"step"=>"any"]) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Unimed Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unimed_id', 'Unidad de medida:') !!}
    {!! Form::select('unimed_id', array_prepend($unimeds,"Seleccione uno..",'') ,null , ['class' => 'form-control',"id" => 'unimeds']) !!}
</div>


<!-- Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagen', 'Imagen:') !!}
    {!! Form::file('imagen', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('items.index') !!}" class="btn btn-default">Cancel</a>
</div>
@push('scripts')
<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
<script>
    $(function () {
        $("#categorias,#unimeds").select2();
    })
</script>
@endpush