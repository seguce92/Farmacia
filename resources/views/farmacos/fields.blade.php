@push('css')
@include('layouts.select2_css')
@endpush
<!-- Fcategoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fcategoria_id', 'Categoría:') !!}
    {!! Form::select('fcategoria_id', $categorias, null, ['class' => 'form-control','id'=>'fcats','multiple'=>"multiple"]) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

@push('scripts')
@include('layouts.select2_js')
@include('layouts.plugins.datepiker_js')
<script>

    $('#fcats').select2({
        language: 'es',
        maximumSelectionLength: 1
    })

</script>
@endpush