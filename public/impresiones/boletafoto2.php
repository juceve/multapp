<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOLETA DE SANCION</title>

</head>

<body>
    <?php
    $data = $_GET['data'];
    $sancion = explode('|', $data);
    $utilitario = new Utilitario();
    date_default_timezone_set('America/La_Paz');

    ?>
    <?php
    // Ruta de la imagen
    $path = '../images/escudoBolivia.gif';

    // Leer la imagen en base64
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    <pre id="pre_print">
<img src="../images/escudoBolivia.gif" style="width: 30%;">
     ASOCIACION 10 DE ABRIL
       Mercado Mutualista
********************************
       BOLETA DE SANCION
          Nro.: <?php echo str_pad($sancion[0], 6, "0", STR_PAD_LEFT); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo str_pad($utilitario->fechaEs($sancion[1]), 32, " ", STR_PAD_RIGHT); ?>
--------------------------------
SOCIO:   <?php echo str_pad($sancion[2], 23, " ", STR_PAD_RIGHT); ?>
CASETA:  <?php echo str_pad($sancion[3], 23, " ", STR_PAD_RIGHT); ?>
PASILLO: <?php echo str_pad($sancion[4], 23, " ", STR_PAD_RIGHT); ?>

----- ----------------- --------
ID    CAUSA SANCION     IMPORTE
----- ----------------- --------
<?php echo str_pad($sancion[5], 5, " ", STR_PAD_RIGHT); ?> <?php echo str_pad($sancion[6], 17, " ", STR_PAD_RIGHT); ?> <?php echo str_pad($sancion[7], 8, " ", STR_PAD_RIGHT); ?>
----- ----------------- --------
Estado Pago: <?php echo str_pad($sancion[8], 19, " ", STR_PAD_RIGHT);?>
--------------------------------
<?php echo $sancion[11]; ?><br>

Usuario:   <?php echo str_pad($sancion[9], 21, " ", STR_PAD_RIGHT); ?>
Impresión: <?php echo str_pad(date('Y-m-d H:i:s'), 21, " ", STR_PAD_RIGHT); ?>
                </pre>
<br>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            // window.print();
            // setTimeout(function() {
            //     // window.close();
            // }, 3000);

            document.body.style.zoom = "80%";
            BtPrint(document.getElementById('pre_print').innerText);
        });
    </script>
    <script>
        function BtPrint(prn) {
            var S = "#Intent;scheme=rawbt;";
            var P = "package=ru.a402d.rawbtprinter;end;";
            var textEncoded = encodeURI(prn);
            window.location.href = "intent:" + textEncoded + S + P;
        }
    </script>

</body>

</html>

<?php
class Utilitario
{
    function formatearTexto($texto, $longitudMaxima = 32) {
        // Dividir el texto en un array de líneas con un tamaño máximo de 32 caracteres cada una
        $lineas = [];

        while (strlen($texto) > 0) {
            // Extraer una porción del texto de máximo 32 caracteres
            $linea = substr($texto, 0, $longitudMaxima);

            // Eliminar la porción ya procesada del texto original
            $texto = substr($texto, $longitudMaxima);

            // Si la longitud de la línea es menor que la máxima, agregar espacios a la derecha
            if (strlen($linea) < $longitudMaxima) {
                $linea = str_pad($linea, $longitudMaxima, ' ', STR_PAD_RIGHT);
            }

            // Añadir la línea al array de líneas formateadas
            $lineas[] = $linea;
        }
    }

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
