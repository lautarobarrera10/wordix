<?php

/**
 * Imprime una partida
 * @param array $partida
 * @param int $numeroPartida
 * @return null
 */
function imprimirPartida($partida, $numeroPartida){
    // string $palabraWordix, $jugador,int $intentos, $puntaje
    $palabraWordix = $partida["palabraWordix"];
    $jugador = $partida["jugador"];
    $intentos = $partida["intentos"];
    $puntaje = $partida["puntaje"];
    escribirNormal("\nPartida WORDIX $numeroPartida: palabra $palabraWordix\n");
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
}


/**
 * Muestra una partida
 * @param array $partidas array de partidas
 * @return null
 */
function mostrarPartida($partidas)
{
    /* int $numeroPartida, $indicePartida
    array $partida */
    if (!empty($partidas)) {
        escribirNormal("Actualmente hay " . count($partidas) . " partida/s \n");
        escribirNormal("Ingrese el número de partida: ");
        do {
            $numeroPartida = solicitarNumeroEntre(0, count($partidas));
            if ($numeroPartida != 0){
                $indicePartida = $numeroPartida -1;
                $partida = $partidas[$indicePartida];
                imprimirPartida($partida, $numeroPartida);
                escribirNormal("\nIngrese otro número de partida para obtener sus datos.\nPara volver al menú principal presione 0\n");
            }
        } while ($numeroPartida != 0);
    } else {
        escribirNormal("\nAún no se han jugado partidas.\nJuega una partida para poder ver su resultado.\n\n");
    }
}
