<?php



require 'utils/utils.php';
require_once 'entities/Connection.class.php';
require_once 'entities/ImagenGaleria.class.php';
require_once 'repository/ImagenGaleriaRepository.class.php';
require_once 'repository/CategoriaRepository.class.php';
require_once 'entities/Categoria.class.php';
require_once 'entities/ImagenGaleria.class.php';


//  $arrayImagenes =[];

//  for($i=0;$i<12;$i++){
//  $nombre =($i+1).".jpg";
//  $descripcion ="descripcion imagen ".($i+1);

//  $arrayImagenes[$i]= new imagenGaleria($nombre,$descripcion,rand(0,1000),rand(0,1000),rand(0,1000));



// }





$arrayImagenes=[];
$imagenRepository = new ImagenGaleriaRepository('imagenes');
$categoriaRepository= new categoriaRepository();


$arrayImagenes = $imagenRepository->findAll();
$asociados = $imagenRepository->findAllAsociados();

if(sizeof($asociados)>3){
    $asociados = manejarAsociados($asociados);
}


require 'views/index.view.php';

