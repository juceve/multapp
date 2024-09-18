<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOLETA DE SANCION</title>

    <style>
        * {
            /* font-size: 11px; */
            font-family: Consolas, monaco, monospace;
        }

        .table1 {
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .table2 {
            border: 0px;
        }

        /* td.producto,
th.producto {
    width: 75px;
    max-width: 75px;
}

td.cantidad,
th.cantidad {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.precio,
th.precio {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
} */

        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 460px;
            max-width: 460px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        /* Estilo para el contenedor principal */
        .contenedor {
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            /* Esto hace que el contenedor ocupe toda la altura de la pantalla */
        }
    </style>
</head>

<body>
    <?php
    $data = $_GET['data'];
    $sancion = explode('|', $data);
    $utilitario = new Utilitario();
    date_default_timezone_set('America/La_Paz');

    ?>
    <div class="contenedor">
        <!-- Div que queremos centrar -->
        <div class="">
            <div class="ticket">
                <div class="centrado" style="margin: 0px;">
                    <!-- <img src="../images/multapp_ico2.jpg" alt="Logotipo" style="width: 20%;"> -->
                    <table class="table2" style="width: 100%; font-size: 18px;">
                        <tr>
                            <td align="right"><img src="../images/escudoSCZ.png" alt="" style="width: 43px;"></td>
                            <td align="center" style="font-size: 13px;">
                                <h3> <strong>ASOCIACIÓN 10 DE ABRIL</strong> <br>Mercado Mutualista</h3>
                            </td>
                            <td align="left"><img src="../images/escudoBolivia.gif" alt="" style="width: 40px;"></td>
                        </tr>
                    </table>

                </div>
                <!-- <hr> -->
                <p style="font-size: 25px; padding: 0;" class="centrado"><strong>BOLETA DE SANCIÓN</strong></p>
                <p class="centrado">
                    Nro.: <?php echo str_pad($sancion[0], 6, "0", STR_PAD_LEFT); ?>
                    <br>
                    <small><?php echo $utilitario->fechaEs($sancion[1]); ?></small>
                </p>
                <hr>
                <div class="container">
                    <table class="table2">
                        <tr style="vertical-align: top;">
                            <td><strong>SOCIO: </strong></td>
                            <td><?php echo $sancion[2] ?></td>
                        </tr>
                        <tr>
                            <td><strong>CASETA: </strong></td>
                            <td><?php echo $sancion[3] ?></td>
                        </tr>
                        <tr>
                            <td><strong>PASILLO: </strong></td>
                            <td><?php echo $sancion[4] ?></td>
                        </tr>
                    </table>

                </div>
                <hr>
                <table class="table1" style="width: 98%;">
                    <thead>
                        <tr style="background-color: #e2e2e2;">
                            <th class="table1">ID</th>
                            <th class="table1">CAUSA SANCION</th>
                            <th class="table1">IMPORTE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center" class="table1"><?php echo $sancion[5]; ?></td>
                            <td align="center" class="table1"><?php echo $sancion[6]; ?></td>
                            <td align="center" class="table1"><?php echo $sancion[7]; ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <span><strong>Estado Pago: <?php echo $sancion[8]; ?></strong></span> <br>
                <div style="text-align: center;">
                    <p><small>Captura:</small></p>
                    <img src="../storage/<?php echo $sancion[10] ?>" alt="" style="max-height: 250px;">
                </div>

                <small>******************************************************* <br> <?php echo $sancion[11] ?> <br>*******************************************************</small> <br>

                <small><i>Usuario: <?php echo $sancion[9]; ?></i></small> <br>
                <small><i>Impresión: <?php echo date('Y-m-d H:i:s'); ?></i></small>

            </div>


        </div>
    </div>

    <br>
    <br>.

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            // window.print();
            // setTimeout(function() {
            //     // window.close();
            // }, 3000);

            document.body.style.zoom = "80%";
        });
    </script>


</body>

</html>

<?php
class Utilitario
{
    function fechaEs($fecha)
    {
        // Crea un objeto DateTime a partir de la cadena de fecha
        $fecha_obj = DateTime::createFromFormat('Y-m-d', $fecha);

        // Valida si la fecha es válida
        if (!$fecha_obj) {
            return 'Fecha inválida';
        }

        // Arreglo con los nombres de los días de la semana en español
        $nombres_dias = array(
            'Domingo',
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sábado'
        );

        // Obtiene el nombre del día de la semana en español
        $nombre_dia = $nombres_dias[$fecha_obj->format('w')];

        // Obtiene el día, mes y año de la fecha
        $dia = $fecha_obj->format('j');
        $mes = $fecha_obj->format('n');
        $anio = $fecha_obj->format('Y');

        // Arreglo con los nombres de los meses en español
        $nombres_meses = array(
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        );

        // Construye la fecha en formato literal
        $fecha_literal = $nombre_dia . ', ' . $dia . ' de ' . $nombres_meses[$mes] . ' de ' . $anio;

        return $fecha_literal;
    }
}

?>