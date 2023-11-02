<?php

/**esta funcion le pide al usuario ingresar una palabra de 5 letras ,
 *  la pasa a mayusculas y la guarda en el arreglo de palabras si esta bien ingresada la palabra 
 * @param array $coleccionPalabras 
 * @return array $coleccionPalabras
 */

function agregarPalabra($coleccionPalabras)
{
    // print_r($coleccionPalabras);

    echo "ingrese palabra de 5 letras (solo se permiten letras)\n";
    $palabraGuardar = trim(fgets(STDIN));
    $palabraGuardar = strtoupper($palabraGuardar);
    /**este if verifica que la palabra tenga 5 letras y
         de ser asi pasa la palabra a mayusculas y lo guarda en el arreglo */
    if (strlen($palabraGuardar) == 5 && ctype_alpha($palabraGuardar) && !in_array($palabraGuardar, $coleccionPalabras)) {
        array_push($coleccionPalabras, $palabraGuardar);
    } else {
        echo "su palabra no se guardó , seguro tenia un caracter extraño o mas de 5 letras. ";
    }
    return ($coleccionPalabras);
}
