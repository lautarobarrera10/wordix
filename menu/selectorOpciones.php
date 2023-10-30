<?php
/**
 * Muestra el menú de opciones
 * @return int opción elegida
 */
function seleccionarOpcion()
{
    // int $numero
    escribirNormal("SELECIONE UNA OPCIÓN: \n");
    escribirNormal("1) Jugar al wordix con una palabra elegida\n");
    escribirNormal("2) Jugar al wordix con una palabra aleatoria\n");
    escribirNormal("3) Mostrar una partida\n");
    escribirNormal("4) Mostrar la primer partida ganadora\n");
    escribirNormal("5) Mostrar resumen de Jugador\n");
    escribirNormal("6) Mostrar listado de partidas ordenadas por jugador y por palabra\n");
    escribirNormal("7) Agregar una palabra de 5 letras a Wordix\n");
    escribirNormal("8) Salir\n");
    $numero = solicitarNumeroEntre(1, 8);
    return $numero;
}