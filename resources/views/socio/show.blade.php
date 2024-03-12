@extends('adminlte::page')

@section('template_title')
Info Socio
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Info Socio
                        </span>

                        <div class="float-right">
                            <a href="{{ route('socios.index') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $socio->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Cedula:</strong>
                        {{ $socio->cedula }}
                    </div>
                    <div class="form-group">
                        <strong>Ext:</strong>
                        {{ $socio->ext }}
                    </div>
                    <div class="form-group">
                        <strong>Emitido:</strong>
                        {{ $socio->emitido }}
                    </div>
                    <div class="form-group">
                        <strong>Celular:</strong>
                        {{ $socio->celular }}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $socio->email }}
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        @if ($socio->estado)
                        <span class="badge badge-pill badge-info">Activo</span>
                        @else
                        <span class="badge badge-pill badge-secondary">Inactivo</span>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection