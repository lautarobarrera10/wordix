<?php 
 // string $nombreUsuario $palabra, int $indicePalabra, array $partida
            // 
            function palabraRandom ($palabras , $partidas){
            $nombreUsuario = solicitarJugador();
            $indicePalabra = rand(1, count($palabras) - 1);
            $palabra = $palabras[$indicePalabra];
            $partida = jugarWordix($palabra, $nombreUsuario);
            array_push($partidas, $partida);
            return $partidas;
        }