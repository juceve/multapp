<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $socio->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid'
            : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cedula') }}
            {{ Form::text('cedula', $socio->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid'
            : ''), 'placeholder' => 'Cedula']) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ext') }}
            {{ Form::text('ext', $socio->ext, ['class' => 'form-control' . ($errors->has('ext') ? ' is-invalid' : ''),
            'placeholder' => 'Ext']) }}
            {!! $errors->first('ext', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('emitido') }}
            {{-- {{ Form::text('emitido', $socio->emitido, ['class' => 'form-control' . ($errors->has('emitido') ? '
            --}}
            {{-- is-invalid' : ''), 'placeholder' => 'Emitido']) }} --}}

            {!! Form::select('emitido',
            [
            ""=>"Seleccione una opción",
            "LP"=>"LP",
            "CB"=>"CB",
            "SC"=>"SC",
            "CH"=>"CH",
            "BN"=>"BN",
            "PN"=>"PN",
            "OR"=>"OR",
            "PT"=>"PT",
            "TJ"=>"TJ",
            ]
            , $socio->emitido?$socio->emitido:"",['class' => 'form-control' . ($errors->has('emitido') ? ' is-invalid' :
            '')]) !!}
            {!! $errors->first('emitido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('celular') }}
            {{ Form::text('celular', $socio->celular, ['class' => 'form-control' . ($errors->has('celular') ? '
            is-invalid' : ''), 'placeholder' => 'Celular']) }}
            {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $socio->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' :
            ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}


            {!! Form::select('estado', ["1"=>"Activo","0"=>"Inactivo"], $socio->estado?$socio->estado:1, ['class' =>
            'form-control' . ($errors->has('estado') ? ' is-invalid'
            : '')]) !!}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <div class="col-12 col-md-4">
            <button type="submit" class="btn btn-primary btn-block">Guardar <i class="fas fa-save"></i></button>
        </div>
    </div>
</div>