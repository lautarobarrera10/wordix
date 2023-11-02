<?php
include_once("wordix.php");
require "menu/selectorOpciones.php";
require "funciones/resumenJugador.php";
require "funciones/primeraPartidaGanadora.php";
require "funciones/ordenarColeccionPartidas.php";
require "menu/agregarPalabra.php";
require "funciones/nombreMinuscula.php";
require "menu/case1Menu.php";
require "menu/case2Menu.php";
require "menu/case4Menu.php";
/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Barrera Lautaro FAI-4801 TUDW lautarobarrera12@gmail.com lautarobarrera10 */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    // array $coleccionPalabras
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PERRO", "PADRE", "MADRE", "PRIMO", "CALOR"
    ];

    return ($coleccionPalabras);
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
$palabras; // array
$partidas; // array
$partida; // array
$opcion; // int

//Inicialización de variables:
$palabras = cargarColeccionPalabras();
$partidas = [];

//Proceso:

do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1:
            $partidas=seleccionPalabra($palabras, $partidas);
            break;
        case 2:
            palabraRandom($palabras, $partidas);
            break;
        case 3:
            // int $numeroPartida, $indicePartida, $intentos, $puntaje array $partida, string $jugador
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
            break;
        case 4:
            partidaGanadora($partidas);
            break;
        case 5:
            escribirNormal("ingrese el nombre del jugador :");
            $nombreJugador = trim(fgets(STDIN));
            $resumen = resumenJugador($partidas, $nombreJugador);
            foreach ($resumen as $indice => $elemento) {
                if (!is_array($elemento)) {
                    escribirNormal($indice . " : " . $elemento . "\n");
                } else {
                    foreach ($elemento as $ind => $elem) {
                        escribirNormal(" intento $ind : $elem \n");
                    }
                }
            }
            break;
        case 6:
            ordenDeColeccion($partidas);
            break;
        case 7:
            $palabras = agregarPalabra($palabras);
            break;
    }
} while ($opcion != 8);
