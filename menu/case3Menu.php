<?php

/**
 * @param array 
 */

// int $numeroPartida, $indicePartida, $intentos, $puntaje array $partida, string $jugador
function mostrarPartida($palabras , $partidas)
{
    if (!empty($partidas)) {
        escribirNormal("actualmente hay " . count($partidas) . " partida/s \n");
        escribirNormal("Ingrese el número de partida: ");
        do {
            $numeroPartida = solicitarNumeroEntre(0, count($palabras));
            $indicePartida = $numeroPartida - 1;
            if (array_key_exists($indicePartida, $partidas)) {
                $partida = $partidas[$indicePartida];
                $palabraWordix = $partida["palabraWordix"];
                $jugador = $partida["jugador"];
                $intentos = $partida["intentos"];
                $puntaje = $partida["puntaje"];
                escribirNormal("Partida WORDIX $numeroPartida: palabra $palabraWordix\n");
                escribirNormal("Jugador: $jugador\n");
                escribirNormal("Puntaje: $puntaje puntos\n");
                switch ($intentos) {
                    case 0:
                        escribirNormal("Intento: no adivinó la palabra\n");
                        break;
                    case 1:
                        escribirNormal("Intento: adivinó la palabra en $intentos intento\n");
                        break;
                    default:
                        escribirNormal("Intento: adivinó la palabra en $intentos intentos\n");
                }
                escribirNormal("Ingrese otro número de partida para obtener sus datos. Para volver al menú principal presione 0\n");
            } else {
                if ($numeroPartida != 0) {
                    escribirNormal("El número de partida no existe. Ingrese un número de partida válido.\n");
                    escribirNormal("Ingrese 0 para volver al menú principal.\n");
                }
            }
        } while ($numeroPartida != 0);
    } else {
        escribirNormal("\nAún no se han jugado partidas.\nJuega una partida para poder ver su resultado.\n\n");
    }
    return $partidas;
}
