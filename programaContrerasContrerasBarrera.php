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
            // string $nombreUsuario $palabra, int $indicePalabra, array $partida
            escribirNormal("Ingresa tu nombre: ");
            $nombreUsuario = trim(fgets(STDIN));
            escribirNormal("Ingresa el número de la palabra con la que quieres jugar: ");
            $indicePalabra = solicitarNumeroEntre(1, count($palabras)) - 1;
            $palabra = $palabras[$indicePalabra];
            $partida = jugarWordix($palabra, $nombreUsuario);
            array_push($partidas, $partida);
            break;
        case 2:
            // string $nombreUsuario $palabra, int $indicePalabra, array $partida
            escribirNormal("Ingresa tu nombre: ");
            $nombreUsuario = trim(fgets(STDIN));
            $indicePalabra = rand(1, count($palabras) - 1);
            $palabra = $palabras[$indicePalabra];
            $partida = jugarWordix($palabra, $nombreUsuario);
            array_push($partidas, $partida);
            break;
        case 3:
            // int $numeroPartida, $indicePartida, $intentos, $puntaje array $partida, string $jugador
            if (!empty($partidas)) {
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
            //
            break;
    }
} while ($opcion != 8);
