<?php
/**ESTA FUNCION CAMBIA UN NOMBRE A MINUSCULA Y NO PERMITE CARACTERES EXTRANOS AL INICIO DEL NOMBRE  */
function solicitarJugador(){
    $valido=false;
    echo "Ingrese su nombre:\n";
    $nombreJugador=trim(fgets(STDIN));
    
    do {
        /**EL CTYPE CAMBIA A MINUSCULAS EL NOMBRE y el if dice que si 
         * el ctype devuelve un 1 es una letra  y sino es un 
         * caracter y ahi vuelve a preguntar nuevamente ,
         *  el ciclo termina cuando inicican bien el nombre  */
        if (ctype_alpha($nombreJugador[0])) {
            $valido = true;
            $nombreJugador = mb_strtolower($nombreJugador);
        } else {
            $valido = false;
            echo "Ingrese su nombre (no se permiten caracteres extraños): \n";
            $nombreJugador = trim(fgets(STDIN));
        }
    } while ($valido!= true);
    return $nombreJugador;
}

