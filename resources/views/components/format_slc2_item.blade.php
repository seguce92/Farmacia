@push('css')
<style>
    /*.select2-result-content { padding-top: 2px; padding-bottom: 2px; }*/
    .select2-result-content { padding: 0px; }
    .select2-result__avatar { float: left; width: 60px; margin-right: 5px; }
    .select2-result__avatar img { width: 100%; height: auto; border-radius: 2px; }
    .select2-result__meta { margin-left: 65px; }
    .select2-result__nombre, .select2-result__laboratorio { color: black; font-weight: bold; word-wrap: break-word; line-height: 1; font-size: 16px}
    .select2-result__nombre { margin-bottom: 2px;}
    .select2-result__laboratorio  { font-size: 14px;}
    .select2-result__precio,.select2-result__ubicacion { margin-right: 1em; }
    .select2-result__precio, .select2-result__ubicacion, .select2-result__stock {
        font-weight: bold; margin-bottom: 0px; margin-top: 0px; display: inline-block; color: #4EAF4C; font-size: 22px; padding: 0px;
    }
    .select2-result__contiene { color: #777; word-wrap: break-word; line-height: 1; font-size: 11px}
    .select2-results__option--highlighted .select2-result__nombre,
    .select2-results__option--highlighted .select2-result__laboratorio { color: white; }
    .select2-results__option--highlighted .select2-result__precio,
    .select2-results__option--highlighted .select2-result__stock,
    .select2-results__option--highlighted .select2-result__ubicacion { color: #F2FC2A; }
    .select2-results__option--highlighted .select2-result__contiene { color: #c6dcef; }
    .select2-results__option{ padding: 2px; }
    .select2-container--default .select2-results>.select2-results__options{ max-height: 400px}
</style>
@endpush
<div class='select2-result-content clearfix'>"+
    "<div class='select2-result__avatar'><img src='{!! asset($imagen) !!}' class='img-responsive' alt='Image'></div>"+
    "<div class='select2-result__meta text-uppercase'>"+
        "<div class='select2-result__nombre'>{{$nombre or 'nombre'}} / {{$descripcion or 'descripcion'}}</div>"+
        "<div class='select2-result__laboratorio'>{{$laboratorio or ''}}</div>"+
        "<div class='select2-result__precio'><i class='fa fa-money'></i> Q {{$precio}} </div>"+
        "<div class='select2-result__ubicacion'><i class='fa fa-archive'></i> {{$ubicacion or ''}} </div>"+
        "<div class='select2-result__stock'><i class='fa fa-cubes'></i> {{$stock or ''}} </div>"+
        "<div class='select2-result__contiene'>{{$contiene or ''}}</div>"+
    "</div>"+
"</div>