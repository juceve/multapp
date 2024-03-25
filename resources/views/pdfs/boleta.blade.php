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
    <p class="centrar"><strong><span style="font-size: 20px">BOLETA DE SANCIÓN</span></strong><br><span>Nro.:
            {{str_pad($sancione->id, 6, "0", STR_PAD_LEFT)}}</span> <br> <span>Del:
            {{fechaEs($sancione->fecha)}}</span></p>
    <hr>
    <table cellspacing="0" cellpadding="0" style="width: 100%;">
        <tr>

            <td><strong>Socio: </strong></td>
            <td>{{$sancione->socio}}</td>

            <td align="right"><strong>Nro.Caseta: </strong></td>
            <td>{{$sancione->nrocaseta}}</td>

            <td align="right"><strong>Pasillo: </strong></td>
            <td>{{$sancione->pasillo}}</td>
        </tr>
    </table>
    <hr>
    <table cellspacing="0" cellpadding="0" border="1" style="width: 100%; margin-top: 2rem; border-spacing: 0">
        <thead>
            <tr style="background-color: #dad9d9">
                <th style="padding: 3px; font-size: 10px">ID</th>
                <th style="padding: 3px; font-size: 10px">CAUSA SANCIÓN</th>
                <th style="padding: 3px; font-size: 10px">ESTADO PAGO</th>
                <th style="padding: 3px; font-size: 10px">IMPORTE</th>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align: center">
                <td style="padding: 3px; font-size: 10px">{{$sancione->causale_id}}</td>
                <td style="padding: 3px; font-size: 10px">{{$sancione->causal}}</td>
                <td style="padding: 3px; font-size: 10px">{{$sancione->estadopago}}</td>
                <td style="padding: 3px; font-size: 10px">{{$sancione->importe}}</td>

            </tr>
        </tbody>
    </table>

    @php
    $imagenes = explode('|',$sancione->url);
    @endphp
    <br>
    <span style=""><strong>CAPTURAS:</strong></span><br><br>
    <div class="contenedor-imagen" style="margin-left: 20rem">
        @foreach ($imagenes as $item)
        <img src="{{asset('storage/'.$item)}}" style="max-height: 200px; align-self: center">
        @endforeach
    </div>
    <hr>
    <table cellspacing="0" cellpadding="0" style="width: 100%;">
        <tr>
            <td align="center"><strong>*{{$sistema->leyendaboleta}}</strong></td>

        </tr>
    </table>

    <hr>
    <small><strong>Usuario:</strong>{{$sancione->usuario}}</small> <br>
    <small><strong>Impresión:</strong>{{date('Y-m-d H:i:s')}}</small>

</body>

</html>