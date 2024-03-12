<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $causale->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? '
            is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('importe bs.') }}
            {{ Form::text('importe', $causale->importe, ['class' => 'form-control' . ($errors->has('importe') ? '
            is-invalid' : ''), 'placeholder' => 'Importe']) }}
            {!! $errors->first('importe', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <div class="col-12 col-md-4">
            <button type="submit" class="btn btn-primary btn-block">Guardar <i class="fas fa-save"></i></button>
        </div>
    </div>
</div>