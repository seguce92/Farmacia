@push('css')
<style>
    #floating_alert {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 5000;
    }
</style>
@endpush
@push('scripts')
<script>
    $(function () {
        bootstrap_alert = function (message, alert, timeout) {
            var div = $(
                    '<div id="floating_alert" class="alert alert-' + alert + ' fade in">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                        message + '&nbsp;&nbsp;' +
                    '</div>'
            ).appendTo('body');

            if(timeout!=0){
                setTimeout(function () {
                    $(".alert").alert('close');
                }, timeout);
            }

        }
    })
</script>
@endpush