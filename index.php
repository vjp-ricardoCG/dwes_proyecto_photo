<?php





require 'entities/ImagenGaleria.class.php';


$arrayImagenes =[];

for($i=1;$i<=12;$i++){
$nombre =$i.".jpg";
$descripcion ="descripcion imagen ".$i;

$arrayImagenes[$i]= new imagenGaleria($nombre,$descripcion,rand(0,1000),rand(0,1000),rand(0,1000));



}

require 'views/index.view.php';

?>