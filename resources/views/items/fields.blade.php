
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group col-sm-6">
    {!! Form::label('categorias', 'Categorias:') !!}
    {!! Form::select('categorias[]', $categorias, $categoriasItem, ['class' => 'form-control','id'=>'categorias','multiple'=>"multiple",'style'=>'width: 100%']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control',"rows"=>2]) !!}
</div>

<!-- Unimed Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unimed_id', 'Unidad de medida:') !!}
    {!! Form::select('unimed_id', $unimeds ,null , ['class' => 'form-control',"id" => 'unimeds','multiple'=>'multiple']) !!}
</div>


<!-- Precio Field -->
<div class="form-group col-sm-3">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::text('precio', null, ['class' => 'form-control',"step"=>"any"]) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-3">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('iestado_id', 1) !!}
</div>

<!-- Ubicacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ubicacion', 'Ubicación:') !!}
    {!! Form::text('ubicacion', null , ['class' => 'form-control']) !!}
</div>

<!-- Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagen', 'Imagen:') !!}
    {!! Form::file('imagen', null, ['class' => 'form-control']) !!}
</div>



@push('scripts')
<script>
    $(function () {
        $("#categorias").select2({
            language: "es",
            placeholder: 'Seleccione uno...'
        }).on('change', function (evt) {
            var selecionados = $(this).select2('data');

            var esMed= esMedicamento(selecionados);

            if(esMed){

                $("#div-datos-medicamentos").collapse('show');
            }else{
                $("#div-datos-medicamentos").collapse('hide');

            }
            console.log(esMed);

        });

        $("#unimeds").select2({
            placeholder: 'Seleccione uno...',
            language: "es",
            maximumSelectionLength: 1

        });

        /**
         * Si se selecciona la categoría medicamentos
         * @param seleccionados
         * @returns {boolean}
         */
        function esMedicamento(seleccionados) {
            var res=false;

            $.each(seleccionados,function (index,element) {
                if(element.id==1){
                    res = true;
                }
            })

            return res;
        }
    })
</script>
@endpush