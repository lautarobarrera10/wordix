<?php
//muestra la primera partida ganadora
function partidaGanadora ($partidas ){
if (!empty($partidas)) {
    $partidaGanada = primeraPartidaGanada($partidas);
    if (!empty($partidaGanada)) {
        $palabraWordix = $partidaGanada["palabraWordix"];
        $jugador = $partidaGanada["jugador"];
        $intentos = $partidaGanada["intentos"];
        $puntaje = $partidaGanada["puntaje"];
        $numeroPartida = $partidaGanada["nroPartida"];
        escribirNormal("Partida WORDIX $numeroPartida: palabra $palabraWordix\n");
        escribirNormal("Jugador: $jugador\n");
        escribirNormal("Puntaje: $puntaje puntos\n");
    } else {
        escribirNormal("no han ganado ninguna partida");
    }
} else {
    escribirNormal("\nAún no se han jugado partidas.\nJuega una partida para poder ver la primera partida ganada.\n\n");
}

}