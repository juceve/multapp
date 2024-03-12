@extends('adminlte::page')

@section('title')
Info Tipo de Pago |
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Info Tipo de Pago
                        </span>

                        <div class="float-right">
                            <a href="{{ route('tipopagos.index') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $tipopago->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Nombrecorto:</strong>
                        {{ $tipopago->nombrecorto }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection