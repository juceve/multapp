<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOLETA DE SANCION</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $data = $_GET['data'];
    $sancion = explode('|', $data);
    ?>

    <div class="ticket">
        <div class="" style="margin: 20px;">
            <!-- <img src="../images/multapp_ico2.jpg" alt="Logotipo" style="width: 20%;"> -->
            <table class="table2">
                <tr>
                    <td><img src="../images/logomercado.jpg" alt="" style="width: 75px;"></td>
                    <td> <strong>ASOCIACIÓN <br> 10 DE ABRIL</strong> <br>Mercado Mutualista</td>
                    <!-- <td><img src="../images/escudoBolivia.gif" alt="" style="width: 40px;"></td> -->
                </tr>
            </table>
            <p></p>

        </div>
        <hr>
        <h3 class="centrado">
            <strong>BOLETA DE SANCIÓN</strong>
            <br>
            Nro.: <?php echo str_pad($sancion[0], 6, "0", STR_PAD_LEFT); ?>
            <br>
            <small> Fecha: <?php echo $sancion[1] ?></small>
        </h3>
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
        <table class="table1" style="width: 97%;">
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
        <span><strong>Estado Sanción: <?php echo $sancion[8]; ?></strong></span> <br>
        <!-- <div style="text-align: center;">
            <p><small>Captura:</small></p>
            <img src="../storage/<?php echo $sancion[10] ?>" alt="" style="max-height: 250px;">
        </div> -->
        <hr>
        <small><i>Usuario: <?php echo $sancion[9]; ?></i></small>
    </div>

    <div>
        <small><strong>*************************************** <br> Todo pago deberá realizarse en Oficinas de la Asociación en Horario de Atención al Cliente. <br>*************************************** </strong></small>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            window.print();
            setTimeout(function() {
                // window.close();
            }, 3000);
        });
    </script>
</body>

</html>