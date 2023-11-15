<?php
include_once("wordix.php");
require "menu/selectorOpciones.php";
require "funciones/solicitarJugador.php";
require "menu/case1Menu.php";
require "menu/case2Menu.php";
require "menu/case3Menu.php";
require "menu/case4Menu.php";
require "menu/case5Menu.php";
require "menu/case6Menu.php";
require "menu/case7Menu.php";

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido y Nombre   | Legajo   | Carrera | mail                       | Usuario Github */
/* Barrera Lautaro     | FAI-4801 | TUDW    | lautarobarrera12@gmail.com | lautarobarrera10 */
/* Contreras Katherine | FAI-4996 | TUDW    | kathijcs@gmail.com         | katherine-j-c-s0 */
/* Contreras Gabriela  | FAI-4480 | TUDW    | gcontreras8522@gmail.com   | Gabriela-contreras */


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
        // "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        // "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        // "PERRO", "PADRE", "MADRE", "PRIMO", "CALOR"
    ];
    // el resto de las palabras estan comentadas para poder hacer un ejemplo de 
    // cuando un jugador haya jugado todas las palabras y no lo deje seguir
    return ($coleccionPalabras);
}

/**
 * Obtiene una colección de partidas
 * @return array
 */
function cargarColeccionPartidas()
{
    // array $coleccionPartidas
    $coleccionPartidas = [
        [
            "palabraWordix" => "MUJER",
            "jugador" => "lautaro",
            "intentos" => 1,
            "puntaje" => 13
        ],
        [
            "palabraWordix" => "QUESO",
            "jugador" => "lautaro",
            "intentos" => 1,
            "puntaje" => 15
        ],
        [
            "palabraWordix" => "FUEGO",
            "jugador" => "gaby",
            "intentos" => 2,
            "puntaje" => 12
        ],
        [
            "palabraWordix" => "CASAS",
            "jugador" => "gaby",
            "intentos" => 2,
            "puntaje" => 15
        ],
        [
            "palabraWordix" => "CASAS",
            "jugador" => "lautaro",
            "intentos" => 2,
            "puntaje" => 15
        ],
        [
            "palabraWordix" => "FUEGO",
            "jugador" => "lautaro",
            "intentos" => 2,
            "puntaje" => 12
        ],
    ];

    return ($coleccionPartidas);
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
$palabras; // array
$partidas; // array
$opcion; // int

//Inicialización de variables:
$palabras = cargarColeccionPalabras();
$partidas = cargarColeccionPartidas();

//Proceso:

do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1:
            $partidas = seleccionPalabra($palabras, $partidas);
            break;
        case 2:
            $partidas = palabraRandom($palabras, $partidas);
            break;
        case 3:
            mostrarPartida($partidas);
            break;
        case 4:
            primeraPartidaGanada($partidas);
            break;
        case 5:
            imprimirResumenJugador($partidas);
            break;
        case 6:
            imprimirColeccionDePartidasOrdenadas($partidas);
            break;
        case 7:
            $palabras = agregarPalabra($palabras);
            break;
    }
} while ($opcion != 8);
