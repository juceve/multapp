<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $sancione->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('socio_id') }}
            {{ Form::text('socio_id', $sancione->socio_id, ['class' => 'form-control' . ($errors->has('socio_id') ? ' is-invalid' : ''), 'placeholder' => 'Socio Id']) }}
            {!! $errors->first('socio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('caseta_id') }}
            {{ Form::text('caseta_id', $sancione->caseta_id, ['class' => 'form-control' . ($errors->has('caseta_id') ? ' is-invalid' : ''), 'placeholder' => 'Caseta Id']) }}
            {!! $errors->first('caseta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('causale_id') }}
            {{ Form::text('causale_id', $sancione->causale_id, ['class' => 'form-control' . ($errors->has('causale_id') ? ' is-invalid' : ''), 'placeholder' => 'Causale Id']) }}
            {!! $errors->first('causale_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('causal') }}
            {{ Form::text('causal', $sancione->causal, ['class' => 'form-control' . ($errors->has('causal') ? ' is-invalid' : ''), 'placeholder' => 'Causal']) }}
            {!! $errors->first('causal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('importe') }}
            {{ Form::text('importe', $sancione->importe, ['class' => 'form-control' . ($errors->has('importe') ? ' is-invalid' : ''), 'placeholder' => 'Importe']) }}
            {!! $errors->first('importe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estadopago') }}
            {{ Form::text('estadopago', $sancione->estadopago, ['class' => 'form-control' . ($errors->has('estadopago') ? ' is-invalid' : ''), 'placeholder' => 'Estadopago']) }}
            {!! $errors->first('estadopago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $sancione->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>