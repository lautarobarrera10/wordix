<?php

/**
 * Filtra las partidas de un jugador
 * @param array $partidas
 * @param string $jugador
 * @return array partidas del jugador
 */
function filtrarPartidasJugador($partidas, $jugador)
{
    // array $partidasJugador
    $partidasJugador = [];
    for ($i = 0; $i < count($partidas); $i++) {
        //busca en todas las partidas las que le pertenezcan al jugador y las pusheas a partidasJugador
        if ($partidas[$i]["jugador"] == $jugador) {
            array_push($partidasJugador, $partidas[$i]);
        }
    }
    return $partidasJugador;
}

/** Encuentra la primer partida ganadora de un jugador y la imprime
 * @param array $partidas
 * @return null
 */

function primeraPartidaGanada($partidas)
{
    // string $nombreUsuario, array $partidasJugador $partidaGanadora, int $cantPartidas, boolean $hayGanadora
    //solicita el nombre de jugador
    $nombreUsuario = solicitarJugador();
    //filtra las partidad con el nombre deljugador ingresado
    $partidasJugador = filtrarPartidasJugador($partidas, $nombreUsuario);
    $cantPartidas = 0;
    $hayGanadora = false;
    $partidaGanadora = [];//aqui se va a pushear la partida que ganó el jugador
    while (count($partidasJugador) !== $cantPartidas && !$hayGanadora) {
       //va a recorrer hasta que hayGanadoras sea verdadero, osea que encuentre la primera ganada.
       //o hasta que se acaben las partidas del jugador
        if ($partidasJugador[$cantPartidas]["puntaje"] > 0) {
            $hayGanadora = true;
            $partidaGanadora = [
                "palabraWordix" => $partidasJugador[$cantPartidas]["palabraWordix"],
                "jugador" => $partidasJugador[$cantPartidas]["jugador"],
                "intentos" => $partidasJugador[$cantPartidas]["intentos"],
                "puntaje" => $partidasJugador[$cantPartidas]["puntaje"],
                "nroPartida" => $cantPartidas + 1
            ];
        }
        $cantPartidas++;
    }
    if ($partidaGanadora) {
        print_r($partidaGanadora);
    } else {
        echo "\n❗ El jugador ingresado no tiene nignuna partida ganada.\n";
    }
}
