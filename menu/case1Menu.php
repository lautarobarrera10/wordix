<?php

/** Le pide el nombre al usuario y hace que el usuario puede elegir 
 * una palabra del arreglo con un numero (que seria la posicion de la palabra en el arreglo )
 * @param array $palabras
 * @param array $partidas
 * @return array nueva colección de partidas */
function seleccionPalabra($palabras, $partidas)
{
    // string $nombreUsuario $palabra, int $indicePalabra, array $partida
    $indicesRepetidos = [];
    $palabraRepetida = false;
    $nombreUsuario = solicitarJugador();
    do {
        escribirNormal("\nIngresa el número de la palabra con la que quieres jugar: ");
        $indicePalabra = solicitarNumeroEntre(0, count($palabras)) - 1;
        for ($i=0; $i < count($partidas); $i++) { 
            foreach ($partidas[$i] as $clave => $valor) {
                if($clave == "jugador" && $valor == $nombreUsuario && $partidas[$i]["palabraWordix"] == $palabras[$indicePalabra]){
                    array_push($indicesRepetidos, $indicePalabra);
                }
            }
        }
        if (in_array($indicePalabra, $indicesRepetidos)){
            $palabraRepetida = true;
        } else {
            $palabraRepetida = false;
        }
        if ($palabraRepetida){
            echo "Ya jugó con esa palabra, seleccione otra.";
        } else {
            $palabra = $palabras[$indicePalabra];
            $partida = jugarWordix($palabra, $nombreUsuario);
            array_push($partidas, $partida);
        }
    } while ($palabraRepetida);
    return $partidas;
}
