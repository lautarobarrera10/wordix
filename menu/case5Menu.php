<?php

/**
 * Devuelve un array con el resumen del jugador
 * @param array $partidas
 * @param string $jugador
 * @return array resumen del jugador o array vacio si el jugador no tiene partidas
 */
function resumenJugador($partidas, $jugador)
{
    // array $resumenJugador $adivinadas, int $cantPartidas, $puntajeTotal, $victorias
    $resumenJugador = [];
    $cantPartidas = 0;
    $puntajeTotal = 0;
    $victorias = 0;
    $adivinadas = [
        "1" => 0,
        "2" => 0,
        "3" => 0,
        "4" => 0,
        "5" => 0,
        "6" => 0,
    ];
    for ($i = 0; $i < count($partidas); $i++) {
        // boolean $esJugador
        $esJugador = false;
        foreach ($partidas[$i] as $indice => $elemento) {
            if ($indice == "jugador" && $elemento == $jugador) {
                $cantPartidas++;
                $esJugador = true;
            }
            if ($esJugador && $indice == "puntaje") {
                $puntajeTotal += $elemento;
                if ($elemento != 0) {
                    $victorias++;
                }
            }
            if ($esJugador && $indice == "intentos") {
                if ($elemento != 0) {
                    $adivinadas[strval($elemento)]++;
                }
            }
        }
    }
    if ($cantPartidas != 0) {
        $porcentajeVictorias = ($victorias / $cantPartidas) * 100;
        $resumenJugador = [
            "jugador" => $jugador,
            "partidas" => $cantPartidas,
            "puntajeTotal" => $puntajeTotal,
            "victorias" => $victorias,
            "porcentajeVictorias" => $porcentajeVictorias,
            "adivinadas" => $adivinadas
        ];
    }
    return $resumenJugador;
}

/** Imprime el resumen de un jugador
 * @param array $partidas
 * @return null
 */
function imprimirResumenJugador($partidas)
{
    // string $nombreJugador, array $resumen
    $nombreJugador = solicitarJugador();
    $resumen = resumenJugador($partidas, $nombreJugador);
    if (!empty($resumen)) {
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
        escribirNormal("\n❗ Jugador no encontrado\n");
    }
}
