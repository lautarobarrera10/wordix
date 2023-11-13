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
    // array para ir agregando cuantas ha adivinado
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
        //pasa por cada partida que es un array
        foreach ($partidas[$i] as $indice => $elemento) {
            //recorre y busca en el array de la partida si es el jugador para guardar sus datos en $resumenJugador
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
        // saca el porcentaje de las victorias solo si ha judado alguna partida
        $porcentajeVictorias = ($victorias / $cantPartidas) * 100;
        //organiza todo los datos para devolver el array con lo que es requerido
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
    //verifica que si haya algo en el resumen, que si haya jugado algo ese jugador
    if (!empty($resumen)) {
        foreach ($resumen as $indice => $elemento) {
            //como resument tiene una clave que es array, tenemos que preguntar para poder devolver bien la informacion
            if (!is_array($elemento)) {
                //aqui va mostrando cada elementos de la clave
                escribirNormal($indice . " : " . $elemento . "\n");
            } else {
                // y aqui muestra con el indice y el elemento del array de adivinadas
                foreach ($elemento as $ind => $elem) {
                    escribirNormal(" intento $ind : $elem \n");
                }
            }
        }
    } else {
        escribirNormal("\n❗ Jugador no encontrado\n");
    }
}
