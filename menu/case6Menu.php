<?php

/** Ordena alfabeticamente primero con nombres y despues palabraWordixs 
 * en orden el arreglo colecciones  de partidas con uasort
 * @param array $a
 * @param array $b
 * @return int (puede retornar 0 ,-1 ó 1)
 */

function ordenar($a, $b)
{
    // int $resultado
    if ($a["jugador"] == $b["jugador"]) {
        return strcmp($a["palabraWordix"], $b["palabraWordix"]);
    } elseif ($a["jugador"] < $b["jugador"]) {
        $resultado = -1;
    } else {
        $resultado = 1;
    }
    return $resultado;
}

/** El uasort recibe el retorno de la funcion ordenar y ordena las 
 * palabras acorde al entero retornado (0,1 ó 1 ) y tambien imprime el arreglo con print_r
 * @param array $partidas 
 */
function imprimirColeccionDePartidasOrdenadas($partidas)
{
    uasort($partidas, 'ordenar');
    if(!empty($partidas)){
        print_r($partidas);
    } else {
        escribirNormal("Aún no se han jugado partidas.\n");
    }
}