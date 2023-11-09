<?php

/** Le pide el nombre al usuario y hace que el usuario puede elegir 
 * una palabra del arreglo con un numero (que seria la posicion de la palabra en el arreglo )
 * @param array $palabras
 * @param array $partidas
 * @return array nueva colección de partidas */
function seleccionPalabra($palabras, $partidas)
{
    // string $nombreUsuario $palabra, int $indicePalabra, array $partida, $palabrasJugadas, boolean $palabraRepetida, $jugoTodas
    $palabrasJugadas = [];
    $palabraRepetida = false;
    $jugoTodas = false;
    $nombreUsuario = solicitarJugador();
    for ($i = 0; $i < count($partidas); $i++) {
        foreach ($partidas[$i] as $clave => $valor) {
            if ($clave == "jugador" && $valor == $nombreUsuario) {
                array_push($palabrasJugadas, $partidas[$i]["palabraWordix"]);
            }
        }
    }
    do {
        if (count($palabrasJugadas) == count($palabras)) {
            echo "\n❌ Este jugador ya jugó con todas las palabras. Ingresa otro nombre.\n";
            $jugoTodas = true;
        } else {
            escribirNormal("\nIngresa el número de la palabra con la que quieres jugar. \nIngresa 0 para salir.\n");
            $indicePalabra = solicitarNumeroEntre(0, count($palabras)) - 1;
            if ($indicePalabra != -1){
                $palabra = $palabras[$indicePalabra];
                if (in_array($palabra, $palabrasJugadas)) {
                    $palabraRepetida = true;
                } else {
                    $palabraRepetida = false;
                }
                if ($palabraRepetida) {
                    echo "\n❗ Ya jugó con esa palabra, seleccione otra.\n";
                } else {
                    $partida = jugarWordix($palabra, $nombreUsuario);
                    array_push($partidas, $partida);
                }
            }
        }
    } while ($palabraRepetida && $indicePalabra != -1 && !$jugoTodas);
    if ($jugoTodas) {
        $partidas = seleccionPalabra($palabras, $partidas);
    }
    return $partidas;
}
