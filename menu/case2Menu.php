<?php 
/**
 * Jugar wordix con una palabra random
 * @param array $palabras
 * @param array $partidas
 * @return array
 */
function palabraRandom ($palabras , $partidas){
    // string $nombreUsuario $palabra $palabraUsada, int $indicePalabra, array $partida $palabrasUsadas
    $nombreUsuario = solicitarJugador();
    $palabrasUsadas = [];
    for ($i=0; $i < count($partidas); $i++) { 
        foreach ($partidas[$i] as $clave => $valor) {
            if($clave == "jugador" && $valor == $nombreUsuario){
                $palabraUsada = $partidas[$i]["palabraWordix"];
                array_push($palabrasUsadas, $palabraUsada);
            }
        }
    }
    if (count($palabrasUsadas) == count($palabras)){
        echo "\nEste jugador ya jugó con todas las palabras\n";
    } else {
        do {
            $indicePalabra = rand(1, count($palabras) - 1);
            $palabra = $palabras[$indicePalabra];
        } while (in_array($palabra, $palabrasUsadas));
        $partida = jugarWordix($palabra, $nombreUsuario);
        array_push($partidas, $partida);
    }
    return $partidas;
}