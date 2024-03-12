@extends('layouts.app')

@section('template_title')
    {{ $vinculo->name ?? __('Show') . " " . __('Vinculo') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vinculo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vinculos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Caseta Id:</strong>
                            {{ $vinculo->caseta_id }}
                        </div>
                        <div class="form-group">
                            <strong>Socio Id:</strong>
                            {{ $vinculo->socio_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
