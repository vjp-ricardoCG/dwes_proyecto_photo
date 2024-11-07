<?php

require 'entities/File.class.php';
require 'entities/imagenGaleria.class.php';
require 'entities/Connection.class.php';
require 'entities/QueryBuilder.class.php';
require_once 'exceptions/AppException.class.php';
require_once 'core/App.class.php';


$errores = [];
$descripcion = '';
$mensaje='';


 try{
    $config = require_once 'app/config.php';
    App::bind('config',$config);

    $queryBuilder = new QueryBuilder('imagenes','ImagenGaleria');
if ($_SERVER['REQUEST_METHOD'] ==='POST'){

    

   

    
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));

    $tiposAceptados =['image/jpeg',"image/jpg","image/gif","image/png"];

    $imagen= new File('imagen',$tiposAceptados);

    $imagen->saveUploadFile((ImagenGaleria::RUTA_IMAGENES_GALLERY));

    $imagen->copyFile(imagenGaleria::RUTA_IMAGENES_GALLERY,imagenGaleria::RUTA_IMAGENES_PORTFOLIO);
    
    

    // $sql="INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre, :descripcion)";

    // $pdoStatement = $connection->prepare($sql);

    // $parametros = [':nombre'=>$imagen->getFileName(),':descripcion'=>$descripcion];

    $imagenGaleria = new imagenGaleria($imagen->getFileName(),$descripcion);
    $queryBuilder->save($imagenGaleria);
    $descripcion="";
    $mensaje="Imagen guardada";


    
}
    $mensaje = 'Datos enviados';
    

    }catch(FileException $exception){

        $errores[] = $exception->getMessage();
    }
    catch(QueryException $exception){

        $errores[] = $exception->getMessage();
    }
    catch(AppException $exception){

        $errores[] = $exception->getMessage();
    }finally{
        
    $imagenes = $queryBuilder->findAll();
    }
require 'views/galeria.view.php';