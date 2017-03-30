<div class="modal fade" id="modal-form-cliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" role="form" id="form-modal-cliente">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Nuevo Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="alert alert-danger " style="display:none;" id="div-error-modal-form-cliente">
                            	<button type="button" class="close" onclick="$(this).parent().hide()">&times;</button>
                            	<strong>Error! </strong><span id="alert-message"></span>
                            </div>
                            @include('clientes.fields')
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{--<button type="submit" class="btn btn-primary">Save changes</button>--}}
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
    $("#form-modal-cliente").submit(function (e) {
        e.preventDefault();
        console.log('enviar formulario modal cliente');

        var data= $(this).serializeArray();

        var $btn = $('#myButton').button('loading');

        $.ajax({
            method: 'POST',
            url: '{{route("api.clientes.store")}}',
            data: data,
            dataType: 'json',
            success: function (res) {
                console.log('respuesta ajax:',res)
                if(res.success){
                    var option = new Option(res.data.nit+" "+res.data.nombres+" "+res.data.apellidos, res.data.id);
                    option.selected = true;

                    $('#clients').append(option).trigger("change");

                    $('#modal-form-cliente').modal('hide');

                    $('#modal-form-cliente').on('hidden.bs.modal', function (e) {
                        bootstrap_alert(res.message,'success',3000);
                    });
                }else{

                }
                $btn.button('reset');
            },
            error: function (res) {
                console.log('respuesta ajax:',res.responseJSON);
                bootstrap_alert('<strong>Error! </strong>'+res.responseJSON.message,'danger',0);
                $btn.button('reset');
            }
        })
    });


</script>
@endpush