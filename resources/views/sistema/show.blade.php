@extends('adminlte::page')

@section('title')
Info Configuración |
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Info Configuración
                        </span>

                        <div class="float-right">
                            <a href="{{ route('sistemas.index') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Leyendaboleta:</strong>
                        {{ $sistema->leyendaboleta }}
                    </div>
                    <div class="form-group">
                        <strong>Dato1:</strong>
                        {{ $sistema->dato1 }}
                    </div>
                    <div class="form-group">
                        <strong>Dato2:</strong>
                        {{ $sistema->dato2 }}
                    </div>
                    <div class="form-group">
                        <strong>Dato3:</strong>
                        {{ $sistema->dato3 }}
                    </div>
                    <div class="form-group">
                        <strong>Dato4:</strong>
                        {{ $sistema->dato4 }}
                    </div>
                    <div class="form-group">
                        <strong>Dato5:</strong>
                        {{ $sistema->dato5 }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection