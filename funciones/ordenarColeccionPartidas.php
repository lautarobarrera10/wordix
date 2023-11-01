<?php

/**esta funcion ordena alfabeticamente primero con nombres y despues palabraWordixs 
 * en orden el arreglo colecciones  de partidas con uasort
 * @param array $a $b 
 * @return Entero (puede retornar 0 ,-1 ó 1)
 */

function ordenar($a, $b)
{

    if ($a["jugador"] == $b["jugador"]) {
        return strcmp($a["palabraWordix"], $b["palabraWordix"]);
    } elseif ($a["jugador"] < $b["jugador"]) {
        $resultado = -1;
    } else {
        $resultado = 1;
    }
    return $resultado;
}

/**el uasort recibe el retorno de la funcion ordenar y ordena las 
 * palabras acorde al entero retornado (0,1 ó 1 ) y tambien imprime el arreglo con print_r
 * @param array $partidas 
    **/

function ordenDeColeccion($partidas)
{
    uasort($partidas, 'ordenar');
    print_r($partidas);
}

/**ordenDeColeccion va en el otro archivo ,pero no supiste donde llamar a la funcion   */
//ordenDeColeccion($partidas);
