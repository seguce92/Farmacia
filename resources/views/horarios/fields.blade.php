<!-- Dia Field -->
<div class="form-group col-sm-6">

    <label for="dia" class="col-sm-2 control-label">Día: </label>
        <select name="dia" id="dia" class="form-control">
            @foreach(arrayDias() as $diaNum => $diaLetra)
                @if($diaNum!=0)
                    <option value="{{$diaNum}}"> {{$diaLetra}}</option>
                @endif
            @endforeach
        </select>
</div>

<!-- Hora Ini Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hora_ini', 'Hora Ini:') !!}
    {!! Form::text('hora_ini', null, ['class' => 'form-control']) !!}
</div>

<!-- Hora Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hora_fin', 'Hora Fin:') !!}
    {!! Form::text('hora_fin', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('horarios.index') !!}" class="btn btn-default">Cancel</a>
</div>
