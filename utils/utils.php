<?php

function esOpcionMenuActiva(string $opcionMenu): bool {
    return strpos($_SERVER['REQUEST_URI'], $opcionMenu);
}

function existeOpcionMenuActivaEnArray(array $opcionesMenu): bool {
    foreach ($opcionesMenu as $opcionMenu) {
        if (esOpcionMenuActiva($opcionMenu)) {
            return true;
        }
    }
    return false;
}

//Función para extraer 3 asociados de un array y los devuelve
function manejarAsociados(array $asociados) : array{
    shuffle($asociados);
    return array_slice($asociados,0,3);
}

?>