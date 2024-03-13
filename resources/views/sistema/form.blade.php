<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('leyendaboleta') }}
            {{ Form::text('leyendaboleta', $sistema->leyendaboleta, ['class' => 'form-control' .
            ($errors->has('leyendaboleta') ? ' is-invalid' : ''), 'placeholder' => 'Leyendaboleta']) }}
            {!! $errors->first('leyendaboleta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dato1') }}
            {{ Form::text('dato1', $sistema->dato1, ['class' => 'form-control' . ($errors->has('dato1') ? ' is-invalid'
            : ''), 'placeholder' => 'Dato1']) }}
            {!! $errors->first('dato1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dato2') }}
            {{ Form::text('dato2', $sistema->dato2, ['class' => 'form-control' . ($errors->has('dato2') ? ' is-invalid'
            : ''), 'placeholder' => 'Dato2']) }}
            {!! $errors->first('dato2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dato3') }}
            {{ Form::text('dato3', $sistema->dato3, ['class' => 'form-control' . ($errors->has('dato3') ? ' is-invalid'
            : ''), 'placeholder' => 'Dato3']) }}
            {!! $errors->first('dato3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dato4') }}
            {{ Form::text('dato4', $sistema->dato4, ['class' => 'form-control' . ($errors->has('dato4') ? ' is-invalid'
            : ''), 'placeholder' => 'Dato4']) }}
            {!! $errors->first('dato4', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dato5') }}
            {{ Form::text('dato5', $sistema->dato5, ['class' => 'form-control' . ($errors->has('dato5') ? ' is-invalid'
            : ''), 'placeholder' => 'Dato5']) }}
            {!! $errors->first('dato5', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar <i class="fas fa-save"></i></button>
    </div>
</div>