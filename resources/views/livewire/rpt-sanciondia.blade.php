<div>
    <div class="tabla-contenedor">
        <table class="tabla tabla-bordered tabla-striped" style="font-size: 12px;">
            <thead>
                <tr class="bg-secondary" style="font-size: 12px;">

                    <td align="center"><strong>CAS.</strong></td>
                    <td align="center"><strong>PAS.</strong></td>
                    <td align="left"><strong>SOCIO</strong></td>
                    {{-- <td>CAUSA</td> --}}
                    {{-- <td>IMPORTE</td> --}}
                    <td align="right"><strong>IMPORTE</strong></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @forelse ($sanciones as $item)
                <tr style="vertical-align: middle">

                    <td align="center">{{$item->caseta?$item->caseta->nro:"NULL"}}</td>
                    <td align="center">{{$item->caseta?$item->caseta->pasillo:"NULL"}}</td>
                    <td align="left">{{$item->socio?$item->socio->nombre:"NULL"}}</td>
                    {{-- <td>{{$item->causal}}</td> --}}
                    {{-- <td>{{$item->importe}}</td> --}}
                    <td align="right">
                        {{number_format($item->importe,1,'.')}}
                    </td>
                    <td>
                        <a href="#{{ $i }}" class="btn btn-sm btn-success">
                            <i class="fas fa-image"></i>
                        </a>
                        <article class="light-box" id="{{ $i++ }}">
                            {{-- <a href="#4" class="light-box-next"><i class="bi bi-arrow-left"></i></a> --}}
                            <img src="{{asset('storage/'.$item->url)}}">
                            {{-- <a href="#2" class="light-box-next"><i class="bi bi-arrow-right"></i></a> --}}
                            <a href="#" class="light-box-close">X</a>
                        </article></button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center"><i>No se encontraron resultados.</i></td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <div class="d-flex justify-content-between">
        <span class="text-light"><strong>CANT.: </strong>{{$sanciones->count()}} Multados</span>
        <span class="text-light"><strong>TOTAL Bs.:
            </strong>{{number_format($sanciones->sum('importe'),1,'.')}}</span>
    </div>
</div>
@section('css')
<link rel="stylesheet" href="{{ asset('vendor/light-box/lightbox.css') }}">
<style>
    .preview-area {
        display: flex;
        flex-wrap: wrap;
    }

    .preview-area img {
        max-width: 150px;
        /* max-width: 200px; */
        margin: 10px 10px 10px;
        object-fit: contain;
    }

    .preview-area img:not(:nth-child(4n)) {
        margin-right: 1.333%;
    }
</style>
<style>
    .tabla-contenedor {
        max-height: 57vh;
        overflow-y: auto;
        margin-bottom: 20px;
        width: calc(100% + 17px);
    }



    .tabla {
        width: 100%;
        border-collapse: collapse;

    }

    .tabla thead {
        background-color: #f8f9fa;
        position: sticky;
        top: 0;
        z-index: 1;
    }


    .tabla-contenedor::-webkit-scrollbar {
        -webkit-appearance: none;
    }

    .tabla-contenedor::-webkit-scrollbar:vertical {
        width: 10px;
    }

    .tabla-contenedor::-webkit-scrollbar-button:increment,
    .tabla-contenedor::-webkit-scrollbar-button {
        display: none;
    }

    .tabla-contenedor::-webkit-scrollbar:horizontal {
        height: 10px;
    }

    .tabla-contenedor::-webkit-scrollbar-thumb {
        background-color: #5756565d;
        border-radius: 20px;
        border: .5px #f1f2f3;
    }

    .tabla-contenedor::-webkit-scrollbar-track {
        border-radius: 10px;
    }

    .tabla-bordered th,
    .tabla-bordered td {
        border: 1px solid #dee2e6;
    }

    .tabla th,
    .tabla td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .tabla thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .tabla tbody+tbody {
        border-top: 2px solid #dee2e6;
    }

    .tabla .tabla {
        background-color: #fff;
    }

    .tabla-sm th,
    .tabla-sm td {
        padding: 0.3rem;
    }

    .tabla-bordered {
        border: 0.5px solid #dee2e631;
    }

    .tabla-bordered th,
    .tabla-bordered td {
        border: 0.5px solid #dee2e631;
    }

    .tabla-bordered thead th,
    .tabla-bordered thead td {
        border-bottom-width: 2px;
    }

    .tabla-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(56, 56, 56, 0.555);
    }
</style>
@endsection