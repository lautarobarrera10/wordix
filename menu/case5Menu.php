<?php

/**te muestra el resumen de un jugador  
 * @param array
 */
function resumJugador($partidas)
{
    $nombreJugador = solicitarJugador();
    $resumen = resumenJugador($partidas, $nombreJugador);
    if ($resumen){
        foreach ($resumen as $indice => $elemento) {
            if (!is_array($elemento)) {
                escribirNormal($indice . " : " . $elemento . "\n");
            } else {
                foreach ($elemento as $ind => $elem) {
                    escribirNormal(" intento $ind : $elem \n");
                }
            }
        }
    } else {
        escribirNormal("Jugador no encontrado\n");
    }
}
