<?php

/**
 * Jugar wordix con una palabra random
 * @param array $palabras
 * @param array $partidas
 * @return array
 */
function palabraRandom($palabras, $partidas)
{
    // string $nombreUsuario $palabra $palabraJugada, int $indicePalabra, array $partida $palabrasJugadas
    $nombreUsuario = solicitarJugador();
    $palabrasJugadas = [];
    for ($i = 0; $i < count($partidas); $i++) {
        foreach ($partidas[$i] as $clave => $valor) {
            if ($clave == "jugador" && $valor == $nombreUsuario) {
                $palabraJugada = $partidas[$i]["palabraWordix"];
                array_push($palabrasJugadas, $palabraJugada);
            }
        }
    }
    if (count($palabrasJugadas) == count($palabras)) {
        echo "\n❗ Este jugador ya jugó con todas las palabras\n";
    } else {
        do {
            $indicePalabra = rand(1, count($palabras) - 1);
            $palabra = $palabras[$indicePalabra];
        } while (in_array($palabra, $palabrasJugadas));
        $partida = jugarWordix($palabra, $nombreUsuario);
        array_push($partidas, $partida);
    }
    return $partidas;
}
