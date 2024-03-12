<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('caseta_id') }}
            {{ Form::text('caseta_id', $vinculo->caseta_id, ['class' => 'form-control' . ($errors->has('caseta_id') ? ' is-invalid' : ''), 'placeholder' => 'Caseta Id']) }}
            {!! $errors->first('caseta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('socio_id') }}
            {{ Form::text('socio_id', $vinculo->socio_id, ['class' => 'form-control' . ($errors->has('socio_id') ? ' is-invalid' : ''), 'placeholder' => 'Socio Id']) }}
            {!! $errors->first('socio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>