<?php
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
