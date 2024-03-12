@extends('adminlte::page')

@section('template_title')
Detalles de la Sanción
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Detalles de la Sanción
                        </span>

                        <div class="float-right">
                            <a href="{{ route('sanciones.index') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <strong>Fecha:</strong>
                                {{ $sancione->fecha }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <strong>Socio:</strong>
                                {{ $sancione->socio->nombre }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <strong>Nro Caseta:</strong>
                                {{ $sancione->caseta->nro }} |
                                <strong>Pasillo:</strong>
                                {{ $sancione->caseta->pasillo }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <strong>Causal:</strong>
                                {{ $sancione->causal }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <strong>Importe Bs.:</strong>
                                {{ $sancione->importe }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <strong>Estado: </strong>
                                {{-- @switch($sancione->estadopago)
                                @case("IMPAGO")
                                <span class="badge badge-pill badge-danger">{{$sancione->estadopago}}</span>
                                @break
                                @case("PAGADO")
                                <span class="badge badge-pill badge-success">{{$sancione->estadopago}}</span>
                                @break
                                @endswitch
                                - --}}
                                @if ($sancione->estado)
                                <span class="badge badge-pill badge-info">Activo</span>
                                @else
                                <span class="badge badge-pill badge-secondary">Inactivo</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($sancione->url)
                    <hr>
                    <div class="container">
                        <h5 class="text-warning">Capturas:</h5>
                        @php
                        $urls = explode("|",$sancione->url)
                        @endphp
                        <div class="row">
                            @foreach ($urls as $item)
                            <div class="col-6 col-md-2 mb-3 text-center">
                                <a href="#{{ $i }}">
                                    <img src="{{ asset('storage/'.$item) }}" class="img-thumbnail" style="height:100px">
                                </a>
                            </div>
                            {{-- <img src="{{asset('storage/'.$item)}}" class="img-fluid px-3 py-3" id="{{uniqid()}}">
                            --}}
                            <article class="light-box" id="{{ $i++ }}">
                                {{-- <a href="#4" class="light-box-next"><i class="bi bi-arrow-left"></i></a> --}}
                                <img src="{{asset('storage/'.$item)}}">
                                {{-- <a href="#2" class="light-box-next"><i class="bi bi-arrow-right"></i></a> --}}
                                <a href="#" class="light-box-close">X</a>
                            </article>
                            @endforeach

                        </div>

                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('vendor/light-box/lightbox.css') }}">
<style>
    .preview-area {
        display: flex;
        flex-wrap: wrap;
    }

    .preview-area img {
        max-width: 150px;
        max-width: 200px;
        margin: 10px 0 10px;
        object-fit: contain;
    }

    .preview-area img:not(:nth-child(4n)) {
        margin-right: 1.333%;
    }
</style>
@endsection