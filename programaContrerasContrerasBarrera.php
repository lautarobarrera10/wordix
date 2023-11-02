<?php
include_once("wordix.php");
require "menu/selectorOpciones.php";
require "funciones/resumenJugador.php";
require "funciones/primeraPartidaGanadora.php";
require "funciones/ordenarColeccionPartidas.php";
require "funciones/nombreMinuscula.php";
require "menu/case1Menu.php";
require "menu/case2Menu.php";
require "menu/case3Menu.php";
require "menu/case4Menu.php";
require "menu/case5Menu.php";
require "menu/case7Menu.php";

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
            $partidas = seleccionPalabra($palabras, $partidas);
            break;
        case 2:
            palabraRandom($palabras, $partidas);
            break;
        case 3:
            $partidas=mostrarPartida($palabras, $partidas);
            break;
        case 4:
            partidaGanadora($partidas);
            break;
        case 5:
            resumJugador($partidas);
            break;
        case 6:
            ordenDeColeccion($partidas);
            break;
        case 7:
            $palabras = agregarPalabra($palabras);
            break;
    }
} while ($opcion != 8);
