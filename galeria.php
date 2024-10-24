<?php

$errores = [];
$descripcion = '';
$mensaje='';

if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $descripcion = trim(htmlspecialchars($_post['descripcion']));
    $mensaje = 'Datos enviados';
}
require 'views/galeria.view.php';