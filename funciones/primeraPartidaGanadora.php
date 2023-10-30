<?php
//recibe un array con todas las partidas y retorna la primera partida ganarada
/**
 * @param array $partidas
 * @return array (la primera partida ganadora y en caso de no encontrar retorna 0)
 */

function primeraPartidaGanada($partidas){
    $cantPartidas = 0;
    $hayGanadora = false;
    $partidaGanadora = [];
    while(count($partidas) !== $cantPartidas && !$hayGanadora){
        if($partidas[$cantPartidas]["puntaje"] > 0){
            $hayGanadora = true;
            $partidaGanadora = [
                "palabraWordix" =>$partidas[$cantPartidas]["palabraWordix"],
                "jugador" => $partidas[$cantPartidas]["jugador"],
                "intentos" => $partidas[$cantPartidas]["intentos"],
                "puntaje" => $partidas[$cantPartidas]["puntaje"],
                "nroPartida" => $cantPartidas + 1
            ];
        }
        $cantPartidas++;
    }
    return $partidaGanadora; 
}
