<?php
/**
 * Devuelve un array con el resumen del jugador
 * @param array $partidas
 * @param string $jugador
 * @return array // resumen del jugador
 */
 function resumenJugador($partidas, $jugador){
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
    for($i=0; $i<count($partidas); $i++){
        $esJugador = false;
        foreach ($partidas[$i] as $indice => $elemento) {
            if($indice == "jugador" && $elemento == $jugador){
                $cantPartidas++;
                $esJugador = true;
            }
            if($esJugador && $indice == "puntaje"){
                $puntajeTotal += $elemento;
                if($elemento != 0){
                    $victorias++;
                }
            }
            if($esJugador && $indice == "intentos"){
                if ($elemento != 0){
                    $adivinadas[strval($elemento)]++;
                }
                
            }
        }
    }
    if ($cantPartidas != 0){
        $porcentajeVictorias = ($victorias / $cantPartidas) * 100 ;
        return [
            "jugador" => $jugador,
            "partidas" => $cantPartidas,
            "puntajeTotal" => $puntajeTotal,
            "victorias" => $victorias,
            "porcentajeVictorias" => $porcentajeVictorias,
            "adivinadas" => $adivinadas
        ];
    } else {
        return false;
    }
 }