<?php
include_once("wordix.php");



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
function cargarColeccionPalabras(){
    // array $coleccionPalabras
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PERRO", "PADRE", "MADRE", "PRIMO", "CALOR"
    ];

    return ($coleccionPalabras);
}

/**
 * Muestra el menú de opciones
 * @return int opción elegida
 */
function seleccionarOpcion(){
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
    $numero = solicitarNumeroEntre(1,8);
    return $numero;
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

//print_r($partida);
// imprimirResultado($partida);

$opcion = seleccionarOpcion();
switch ($opcion) {
    case 1:
        // string $nombreUsuario $palabra, int $indicePalabra, array $partida
        escribirNormal("Ingresa tu nombre: ");
        $nombreUsuario = trim(fgets(STDIN));
        escribirNormal("Ingresa el número de la palabra con la que quieres jugar: ");
        $indicePalabra = solicitarNumeroEntre(1, 10) - 1;
        $palabra = $palabras[$indicePalabra];
        $partida = jugarWordix($palabra, $nombreUsuario);
        array_push($partidas, $partida);
        break;
}
