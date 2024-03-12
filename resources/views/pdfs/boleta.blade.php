<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        * {
            /* font-size: 11px; */
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
    </style>


    <title>Boleta - MultApp</title>
</head>

<body>

    <table class="table" style="border-color: white; vertical-align: top;margin-bottom: 2rem">
        <tr>
            <td style="width: 100px;">
                <img src="{{asset('images/logomercado.jpg')}}" style="width: 100px">
            </td>
            <td>
                <strong>ASOCIACIÓN 10 DE ABRIL</strong> <br>
                Mercado Mutualista
            </td>
        </tr>
    </table>
    <p class="centrar"><strong><span style="font-size: 25px;">BOLETA DE SANCIÓN</span></strong><br><span
            style="font-size: 18px">Nro.: 000000</span> <br> <span style="font-size: 18px">Fecha:
            {{$sancione->fecha}}</span></p>
    <hr>
    <table style="width: 100%;">
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

    <table cellspacing="0" cellpadding="0" border="1" style="width: 100%; margin-top: 2rem">
        <thead>
            <tr style="background-color: #dad9d9">
                <th style="padding: 8px">ID</th>
                <th style="padding: 8px">CAUSA SANCIÓN</th>
                <th style="padding: 8px">ESTADO PAGO</th>
                <th style="padding: 8px">IMPORTE</th>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align: center">
                <td style="padding: 1rem">{{$sancione->causale_id}}</td>
                <td style="padding: 1rem">{{$sancione->causal}}</td>
                <td style="padding: 1rem">{{$sancione->estadopago}}</td>
                <td style="padding: 1rem">{{$sancione->importe}}</td>

            </tr>
        </tbody>
    </table>

    @php
    $imagenes = explode('|',$sancione->url);
    @endphp
    <div class="row">
        <h4>CAPTURAS</h4>
        @foreach ($imagenes as $item)
        <div class="col">
            <img src="{{asset('storage/'.$item)}}">
        </div>
        @endforeach

    </div>
    </div>


</body>

</html>