@extends('adminlte::page')

@section('title')
Info Caseta |
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Info Caseta
                        </span>

                        <div class="float-right">
                            <a href="{{ route('casetas.index') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Nro:</strong>
                        {{ $caseta->nro }}
                    </div>
                    <div class="form-group">
                        <strong>Pasillo:</strong>
                        {{ $caseta->pasillo }}
                    </div>
                    <div class="form-group">
                        <strong>Socio:</strong>
                        {{ $caseta->socio->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        @if ($caseta->estado)
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