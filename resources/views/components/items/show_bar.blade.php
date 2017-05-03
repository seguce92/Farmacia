@push('css')
<style>

    .item-contiene-show, .item-indicaciones-show,.item-contraindicaciones-show,.item-advertencias-show{
        font-size: 12px; line-height: 1;
    }

    .item-contiene-show > b,
    .item-indicaciones-show > b,
    .item-contraindicaciones-show > b,
    .item-advertencias-show > b {
        font-weight: 700; font-size: 12px; text-transform: uppercase;
    }
</style>
@endpush
<div class='box'>"+
    "<div class='box-body'>"+
        "<div class='row' >"+
            "<div class='col-sm-3' style='padding-right: 0px'>"+
                "<a href='{!! asset($imagen) !!}' data-fancybox  id='fancy-box-img-item-show' tabindex='1000'>"+
                    "<img src='{!! asset($imagen) !!}' class='img-responsive img-show-bar' style='' id='img-item-show'>"+
                "</a>"+
            "</div>"+
            "<div class='col-sm-9'>"+
{{--                Nombre: {{$nombre or null}} <br>--}}
                "<h4 style='margin-bottom: 0px; margin-top: 0px'>{{$descripcion or 'Descripcion'}} <small><i class='fa fa-home'></i> <b>{{$laboratorio or 'Laboratorio'}} </b></small></h4>"+
                "<div class='select2-result__precio'><i class='fa fa-money'></i> Q {{$precio or 0}} </div>"+
                "<div class='select2-result__ubicacion'><i class='fa fa-archive'></i> {{$ubicacion or 'Ubicación'}} </div>"+
                "<div class='select2-result__stock'><i class='fa fa-cubes'></i> {{$stock or 'Stock'}} </div><br>"+
                "<p class='item-contiene-show text-justify text-lowercase'> <b>CONTIENE:</b> {{$contiene or 'Contiene'}} </p>"+
                "<p class='item-indicaciones-show text-justify text-lowercase'> <b>INDICACIONES:</b> {{$indicaciones or 'Indicaciones'}} </p>"+
                "<p class='item-contraindicaciones-show text-justify text-lowercase'> <b>CONTRAINDICACIONES:</b> {{$contraindicaciones or 'Contraindicaciones'}} </p>"+
                "<p class='item-advertencias-show text-justify text-lowercase'> <b>ADVERTENCIAS:</b> {{$advertencias or 'Advertencias'}} </p>"+
            "</div>"+
        "</div>"+
    "</div>"+
"</div>