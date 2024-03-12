<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nro') }}
            {{ Form::text('nro', $caseta->nro, ['class' => 'form-control' . ($errors->has('nro') ? ' is-invalid' : ''),
            'placeholder' => 'Nro']) }}
            {!! $errors->first('nro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pasillo') }}
            {{ Form::text('pasillo', $caseta->pasillo, ['class' => 'form-control' . ($errors->has('pasillo') ? '
            is-invalid' : ''), 'placeholder' => 'Pasillo']) }}
            {!! $errors->first('pasillo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Socio') }}
            {!! Form::select('socio_id', $socios, $caseta->socio_id?$caseta->socio_id:null, ['class' => 'form-control' .
            ($errors->has('socio_id') ? '
            is-invalid' : ''), 'placeholder' => 'Seleccione un socio']) !!}
            {!! $errors->first('socio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {!! Form::select('estado', ["1"=>"Activo","0"=>"Inactivo"], $caseta->estado?$caseta->estado:1, ['class' =>
            'form-control' . ($errors->has('estado') ? '
            is-invalid' : '')]) !!}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <div class="col-12 col-md-4">
            <button type="submit" class="btn btn-primary btn-block">Guardar <i class="fas fa-save"></i></button>
        </div>
    </div>
</div>