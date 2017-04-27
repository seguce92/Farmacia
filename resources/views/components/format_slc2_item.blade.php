@push('css')
<style>
    .select2-result-repository { padding-top: 4px; padding-bottom: 3px; }
    .select2-result-repository__avatar { float: left; width: 60px; margin-right: 10px; }
    .select2-result-repository__avatar img { width: 100%; height: auto; border-radius: 2px; }
    .select2-result-repository__meta { margin-left: 70px; }
    .select2-result-repository__title { color: black; font-weight: bold; word-wrap: break-word; line-height: 1.1; margin-bottom: 4px; }
    .select2-result-repository__forks, .select2-result-repository__stargazers { margin-right: 1em; }
    .select2-result-repository__forks, .select2-result-repository__stargazers, .select2-result-repository__watchers {
        display: inline-block; color: #0f4bac; font-size: 13px; padding: 0px;
    }
    .select2-result-repository__description { font-size: 13px; color: #777; margin-top: 4px; }
    .select2-results__option--highlighted .select2-result-repository__title { color: white; }
    .select2-results__option--highlighted .select2-result-repository__forks, .select2-results__option--highlighted .select2-result-repository__stargazers, .select2-results__option--highlighted .select2-result-repository__description, .select2-results__option--highlighted .select2-result-repository__watchers { color: #c6dcef; }
</style>
@endpush
<div class='select2-result-repository clearfix'>"+
    @if($imagen=='undefined')
        "<div class='select2-result-repository__avatar'><img src='{!! asset($imagen) !!}' class='img-responsive' alt='Image'></div>"+
    @else
        "<div class='select2-result-repository__avatar'><img src='{!! asset('img/avatar_none.png') !!}' class='img-responsive' alt='Image'></div>"+
    @endif
    "<div class='select2-result-repository__meta'>"+
        "<div class='select2-result-repository__title'>{{$nombre or 'nombre'}} / {{$descripcion or 'descripcion'}}</div>"+
        "<div class='select2-result-repository__title'>{{$laboratorio or ''}}</div>"+
        "<div class='select2-result-repository__statistics'>"+
            {{--"<div class='select2-result-repository__forks'><strong>{{$laboratorio or 'laboratorio'}} </strong></div>"+--}}
            "<div class='select2-result-repository__stargazers'><i class='fa fa-money'></i> <strong>Q {{$precio}} </strong></div>"+
            "<div class='select2-result-repository__watchers'><i class='fa fa-archive'></i> <strong>{{$ubicacion or ''}} </strong></div>"+
            "</div>"+
        "<div class='select2-result-repository__description'>{{$contiene or ''}}</div>"+

    "</div>"+
"</div>