<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        * {
            font-size: 12px;
            /* font-family: Consolas, monaco, monospace;
             */
            font-family: Arial, Helvetica, sans-serif;
        }

        .centrar {
            text-align: center;
        }

        .p0 {
            padding: 0;
        }

        .container {
            display: grid;
            gap: 20px;
        }

        .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(50%, 1fr));
        }

        .col {
            padding: 20px;
            text-align: center;
        }

        .contenedor-imagen {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            /* O el alto deseado */
            width: 100%;
            /* Ajusta este valor según necesites */
        }
    </style>


    <title>Boleta - MultApp</title>
</head>

<body>
    <table class="table2">
        <tr>
            <td align="center"><img src="{{asset('images/escudoSCZ.png')}}" alt="" style="width: 43px;"></td>
            <td align="center" style="font-size: 13px;"> <strong>ASOCIACIÓN 10 DE ABRIL</strong> <br>Mercado Mutualista
            </td>
            <td align="center"><img src="{{asset('images/escudoBolivia.gif')}}" alt="" style="width: 40px;"></td>
        </tr>
    </table>
    <p class="centrar">
        <strong><span style="font-size: 20px">REPORTE DE SANCIONES</span></strong><br>
        <span>Del: {{fechaCortaEs($parametros[2])}} Al: {{fechaCortaEs($parametros[3])}}</span> <br>
        <span>Pasillo: {{$parametros[0]?$parametros[0]:"TODOS"}} - Caseta:
            {{$parametros[1]?$parametros[1]:"TODOS"}}</span> -
        <span>Socio: {{$parametros[4]?$parametros[4]:"TODOS"}}</span>
    </p>
    <hr>

    @foreach ($sanciones as $item)

    <table style="width: 100%">
        <tr>
            <td>
                <table>
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td>{{$item->id}}</td>
                    </tr>
                    <tr>
                        <td><strong>FECHA:</strong></td>
                        <td>{{fechaEs($item->fecha)}}</td>
                    </tr>
                    <tr>
                        <td><strong>SOCIO:</strong></td>
                        <td>{{$item->socio}}</td>
                    </tr>
                    <tr>
                        <td><strong>CASETA:</strong></td>
                        <td>{{$item->nrocaseta}}</td>
                    </tr>
                    <tr>
                        <td><strong>PASILLO:</strong></td>
                        <td>{{$item->pasillo}}</td>
                    </tr>
                    <tr>
                        <td><strong>CAUSA SANCIÓN:</strong></td>
                        <td>{{$item->causal}}</td>
                    </tr>

                    <tr>
                        <td><strong>IMPORTE Bs.:</strong></td>
                        <td>{{$item->importe}}</td>
                    </tr>
                    <tr>
                        <td><strong>ESTADO PAGO:</strong></td>
                        <td>{{$item->estadopago}}</td>
                    </tr>

                </table>
            </td>
            <td align="right">
                @php
                $ruta = public_path()."/storage/".$item->url;
                @endphp
                @if (file_exists($ruta))
                <img src="{{asset('storage/'.$item->url)}}" style="max-height: 200px;">

                @else
                <img src="{{asset('images/no-image.png')}}" style="max-height: 150px;">

                @endif


            </td>
        </tr>
    </table>
    <hr>
    @endforeach

</body>

</html>