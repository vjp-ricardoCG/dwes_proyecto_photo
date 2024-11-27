<?php

require_once 'entities/File.class.php';
require 'utils/utils.php';
require_once 'entities/Connection.class.php';
require_once 'entities/ImagenGaleria.class.php';
require_once 'exceptions/AppException.class.php';
require 'core/App.class.php';
require_once 'repository/ImagenGaleriaRepository.class.php';
require_once 'repository/CategoriaRepository.class.php';
require_once 'entities/Categoria.class.php';


$errores = [];
$descripcion = '';
$mensaje='';


 try{
    $config = require_once 'app/config.php';
    App::bind('config',$config);

    $imagenRepository = new ImagenGaleriaRepository();
    $categoriaRepository= new categoriaRepository();
if ($_SERVER['REQUEST_METHOD'] ==='POST'){

    

   

    
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));

    $categoria =trim(htmlspecialchars($_POST['categoria']));

    $tiposAceptados =['image/jpeg',"image/jpg","image/gif","image/png"];

    $imagen= new File('imagen',$tiposAceptados);
    

    $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

    $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY,ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
    
    

    // $sql="INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre, :descripcion)";

    // $pdoStatement = $connection->prepare($sql);

    // $parametros = [':nombre'=>$imagen->getFileName(),':descripcion'=>$descripcion];

    $imagenGaleria = new imagenGaleria($imagen->getFileName(),$descripcion,$categoria);
    $imagenRepository->guarda($imagenGaleria);
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
        
    $imagenes = $imagenRepository->findAll();
    $categorias=$categoriaRepository->findAll();
    }
require 'views/galeria.view.php';