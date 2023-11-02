<?php

/**esta funcion le pide el nombre al usuario y hace que el usuario puede elegir 
 * una palabra del arreglo con un numero (que seria la posicion de la palabra en el arreglo )  
 * @param array
 * @param array
 * @return array */
// string $nombreUsuario $palabra, int $indicePalabra, array $partida
function seleccionPalabra($palabras, $partidas)
{
    $nombreUsuario = solicitarJugador();
    escribirNormal("Ingresa el número de la palabra con la que quieres jugar: ");
    $indicePalabra = solicitarNumeroEntre(1, count($palabras)) - 1;
    $palabra = $palabras[$indicePalabra];
    $partida = jugarWordix($palabra, $nombreUsuario);
    array_push($partidas, $partida);
    return $partidas;
}
