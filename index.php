<?php



require "partials/asociado.php";

require 'entities/ImagenGaleria.class.php';


$arrayImagenes =[];

for($i=0;$i<12;$i++){
$nombre =($i+1).".jpg";
$descripcion ="descripcion imagen ".($i+1);

$arrayImagenes[$i]= new imagenGaleria($nombre,$descripcion,rand(0,1000),rand(0,1000),rand(0,1000));

$arrayAsociados = [$asociado1,$asociado2,$asociado3];

}


require 'views/index.view.php';

?>