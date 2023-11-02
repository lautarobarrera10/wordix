<?php
// string $nombreUsuario $palabra, int $indicePalabra, array $partida
function seleccionPalabra($palabras , $partidas){
$nombreUsuario = solicitarJugador();
escribirNormal("Ingresa el número de la palabra con la que quieres jugar: ");
$indicePalabra = solicitarNumeroEntre(1, count($palabras)) - 1;
$palabra = $palabras[$indicePalabra];
$partida = jugarWordix($palabra, $nombreUsuario);
array_push($partidas, $partida);
return $partidas;
}