<?php
//muestra la primera partida ganadora
function partidaGanadora($partidas)
{
    $nombreUsuario = solicitarJugador();
    $i = 0;
    $victoriaUsuario = 0;
    while (count($partidas) > $i) {
        if ($nombreUsuario === $partidas[$i]["jugador"] && $partidas[$i]["puntaje"] > 0) {
            $victoriaUsuario = 1;
            $hayPartida = $partidas[$i]["jugador"];
        } else if ($nombreUsuario === $partidas[$i]["jugador"]) {
            $hayPartida = $partidas[$i]["jugador"];
        }
        $i++;
    }
    if (!empty($partidas) && $nombreUsuario == $hayPartida) {
        $partidaGanada = primeraPartidaGanada($partidas);
        if (!empty($partidaGanada) && $victoriaUsuario === 1) {
            $palabraWordix = $partidaGanada["palabraWordix"];
            $jugador = $partidaGanada["jugador"];
            $intentos = $partidaGanada["intentos"];
            $puntaje = $partidaGanada["puntaje"];
            $numeroPartida = $partidaGanada["nroPartida"];
            escribirNormal("Partida WORDIX $numeroPartida: palabra $palabraWordix\n");
            escribirNormal("Jugador: $jugador\n");
            escribirNormal("Puntaje: $puntaje puntos\n");
        } else if ($victoriaUsuario == 0) {
            escribirNormal("no han ganado ninguna partida");
        }
    } else {
        escribirNormal("\nAún no se han jugado partidas.\nJuega una partida para poder ver la primera partida ganada.\n\n");
    }
}
