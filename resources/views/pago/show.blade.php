@extends('layouts.app')

@section('template_title')
    {{ $pago->name ?? __('Show') . " " . __('Pago') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pagos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $pago->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Origen Id:</strong>
                            {{ $pago->origen_id }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $pago->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Importe:</strong>
                            {{ $pago->importe }}
                        </div>
                        <div class="form-group">
                            <strong>Tipopago Id:</strong>
                            {{ $pago->tipopago_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $pago->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
