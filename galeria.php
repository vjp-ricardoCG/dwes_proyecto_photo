<?php

require 'entities/File.class.php';
require 'entities/imagenGaleria.class.php';
require 'entities/Connection.class.php';
require 'entities/QueryBuilder.class.php';

$errores = [];
$descripcion = '';
$mensaje='';


 try{
$connection = Connection::make();
if ($_SERVER['REQUEST_METHOD'] ==='POST'){


   

    
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));

    $tiposAceptados =['image/jpeg',"image/jpg","image/gif","image/png"];

    $imagen= new File('imagen',$tiposAceptados);

    $imagen->saveUploadFile((ImagenGaleria::RUTA_IMAGENES_GALLERY));

    $imagen->copyFile(imagenGaleria::RUTA_IMAGENES_GALLERY,imagenGaleria::RUTA_IMAGENES_PORTFOLIO);
    
    

    $sql="INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre, :descripcion)";

    $pdoStatement = $connection->prepare($sql);

    $parametros = [' :nombre'=>$imagen->getFileName(),' :descripcion'=>$descripcion];


    if($pdoStatement->execute($parametros)=== false){
        $errores[]="No se ha podido guardar la imagen en la BD";


    }else{
        $descripcion="";
        $mensaje= "Imagen guardada";
    }
}
    $mensaje = 'Datos enviados';
    $queryBuilder = new QueryBuilder($connection);
    $imagenes = $queryBuilder->findAll("imagenes","ImagenGaleria");

    }catch(FileException $exception){

        $errores[] = $exception->getMessage();
    }
    catch(QueryException $exception){

        $errores[] = $exception->getMessage();
    }

require 'views/galeria.view.php';