<?php

/**esta funcion le pide al usuario ingresar una palabra de 5 letras ,
 *  la pasa a mayusculas y la guarda en el arreglo de palabras si esta bien ingresada la palabra 
 * @param array $coleccionPalabras 
 * @return array $coleccionPalabras
 */

function agregarPalabra($coleccionPalabras)
{
    $palabraAgregada = false;
    $salir = false;
    $nuevaColeccion = $coleccionPalabras;

    do {
        echo "\nPresiona 0 para salir.\n";
        echo "Ingrese una palabra de 5 letras.\n";
        $palabraGuardar = strtoupper(trim(fgets(STDIN)));
        if ($palabraGuardar == 0){
            $salir = true;
        }
        else if (strlen($palabraGuardar) != 5){
            echo "\n❌ Debe ingresar una palabra de 5 letras.\n\n";
        }
        else if (!ctype_alpha($palabraGuardar)){
            echo "\n❌ La palabra sólo puede tener letras.\n\n";
        }
        else if (in_array($palabraGuardar, $coleccionPalabras)){
            echo "\n❌ Esa palabra ya existe. Ingresa otra palabra. \n\n";
        }
        else {
            array_push($nuevaColeccion, $palabraGuardar);
            $palabraAgregada = true;
            echo "\n✅ Palabra agregada\n\n";
        }
    } while (!$palabraAgregada && !$salir);
    return $nuevaColeccion;
}
