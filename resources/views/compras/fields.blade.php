@push('css')
@include('layouts.select2_css')
@include('layouts.plugins.datepiker_css')
<style>
    .panel-body{
        padding-bottom: 0px;
        padding-left: 0px;
        padding-right: 0px;
    }
    .panel {
        margin-bottom: 0px;
        border-radius: 0px;

    }
</style>
@endpush
<!-- Proveedore Id Field -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group col-sm-12">
            <label for="proveedores" class="control-label">
                Proveedor:
                <a  data-toggle="modal" href="#modal-form-proveedores" tabindex="1000">Nuevo</a>
            </label>
            {!! Form::select('proveedor_id', $proveedores ,$tempCompra->proveedor_id,['class' => 'form-control', 'id'=>'proveedores','multiple'=>"multiple",'style' => "width: 100%"]) !!}
        </div>
    </div>
</div>


<!-- Tcomprobante ID Field -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group col-sm-12">
            {!! Form::label('tcomprobante', 'Tipo Comprobante:') !!}
            {!! Form::select('tcomprobante_id', $tiposComprobantes ,$tempCompra->tcomprobante_id ,['class' => 'form-control', 'id'=>'tcomprobantes','multiple'=>"multiple",'style' => "width: 100%"]) !!}
        </div>
    </div>
</div>

<!-- Fecha Field -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group col-sm-12">
        {!! Form::label('fecha', 'Fecha:') !!}
        {!! Form::text('fecha', hoy(), ['class' => 'form-control','id'=>'fecha']) !!}
        </div>
    </div>
</div>

<!-- Serie Field -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group col-sm-12">
            {!! Form::label('serie', 'Serie:') !!}
            {!! Form::text('serie', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Numero Field -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group col-sm-12">
            {!! Form::label('numero', 'Numero:') !!}
            {!! Form::text('numero', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group col-sm-12">
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('unimeds.index') !!}" class="btn btn-default">Cancel</a>

                <a href="#modal-confirma-procesar" type="button" id="btn-procesar" class="btn btn-success pull-right" data-toggle="modal">
                    <span class="glyphicon glyphicon-ok"></span> Procesar
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-confirma-procesar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">PROCESAR COMPRA!</h4>
			</div>
			<div class="modal-body">
				Seguro que desea continuar?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
				<button type="submit" class="btn btn-primary" name="procesar" value="1" >SI</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('scripts')
<!--****** Scripts campos compras ******-->
<script>
    $(function () {

        $("#proveedores,#tcomprobantes").select2({
            language: "es",
            maximumSelectionLength: 1
        })

        $("#fecha").datepicker({
            language : 'es'
        });
    })
</script>
@endpush