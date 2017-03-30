<div class="modal fade" id="modal-form-proveedores">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="form-modal-proveedores">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Nuevo Proveedor</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @include('proveedores.fields')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="myButton" data-loading-text="Loading..." class="btn btn-primary" autocomplete="off">
                        Guardar
                    </button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@push('scripts')
@include('layouts.bootstrap_alert_float')
<script>
    $(function () {
        $("#form-modal-proveedores").submit(function (e) {
            e.preventDefault();
            console.log('Envío de formulario por ajax');

            var data= $(this).serializeArray();
            var modal=$("#modal-form-proveedores");
            var $btn = $('#myButton').button('loading');

            $.ajax({
                method: 'POST',
                url: '{{route("api.proveedors.store")}}',
                data: data,
                dataType: 'json',
                success: function (res) {
                    console.log('respuesta ajax:',res)
                    if(res.success){
                        var option = new Option(res.data.nombre,res.data.id);
                        option.selected = true;

                        $("#proveedores").append(option).trigger("change");

                        modal.modal('hide');

                        modal.on('hidden.bs.modal', function () {
                            bootstrap_alert('<strong>Error!</strong> '+res.message,'success',5000);
                        });
                    }

                    $btn.button('reset');
                },
                error: function (res) {

                    console.log('respuesta ajax:',res);
                    bootstrap_alert('<strong>Error!</strong> '+res.responseJSON.message,'danger',5000);
                    $btn.button('reset');
                }
            })
        })
    })
</script>
@endpush