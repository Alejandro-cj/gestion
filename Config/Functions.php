<?php
function time_ago($fecha)
{
    $diferencia = time() - $fecha;
    if ($diferencia < 1) {
        return 'Justo ahora';
    }
    $condicion = array(
        12 * 30 * 24 * 60 * 60  => 'año',
        30 * 24 * 60 * 60 => 'mes',
        24 * 60 * 60 => 'dia',
        60 * 60 => 'hora',
        60 => 'minuto',
        1 => 'segundo'
    );
    foreach ($condicion as $secs => $str) {
        $d = $diferencia / $secs;
        if ($d >= 1) {
            //redondear
            $t = round($d);
            return 'hace ' . $t . ' ' . $str . ($t > 1 ? 's' : '');
        }
    }
}

?>