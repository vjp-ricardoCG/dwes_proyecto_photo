<!-- ?php
// require 'utils/utils.php';





// require_once 'entities/Asociado.class.php';

// $asociado1 = new Asociado("Asociado 1" , "log1.jpg","log1");
// $asociado2 = new Asociado("Asociado 2" , "log2.jpg","log2");
// $asociado3 = new Asociado("Asociado 3" , "log3.jpg","log3");
// $asociado4 = new Asociado("Asociado 4" , "log1.jpg","log1");
// $asociado5 = new Asociado("Asociado 5" , "log2.jpg","log2");
// $asociado6 = new Asociado("Asociado 6" , "log3.jpg","log3");

// $asociados=[$asociado1,$asociado2,$asociado3,$asociado4,$asociado5,$asociado6];


// if(sizeof($asociados)>3){

//    $asociados= manejarAsociados($asociados);
// } 

<?php
require_once 'entities/Asociado.class.php';
require_once 'entities/File.class.php';
require 'utils/utils.php';
require_once 'entities/Connection.class.php';
require_once 'entities/imagenAsociado.class.php';
require_once 'exceptions/AppException.class.php';
require_once 'core/App.class.php';
require_once 'repository/ImagenGaleriaRepository.class.php';
require_once 'repository/AsociadoRepository.class.php';
require_once 'repository/CategoriaRepository.class.php';
require_once 'entities/Categoria.class.php';


$errores = [];
$descripcion = '';
$mensaje='';


 try{
    

    $imagenRepository = new AsociadoRepository();
    
if ($_SERVER['REQUEST_METHOD'] ==='POST'){

    

   

    
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));

    $nombre =trim(htmlspecialchars($_POST['nombre']));
    

    $tiposAceptados =['image/jpeg',"image/jpg","image/gif","image/png"];

    $logo= new File('logo',$tiposAceptados);
    echo"hola".$logo->getFileName();

    $logo->saveUploadFile(imagenAsociado::RUTA_IMAGENES_GALLERY);

    
    
    

    // $sql="INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre, :descripcion)";

    // $pdoStatement = $connection->prepare($sql);

    // $parametros = [':nombre'=>$imagen->getFileName(),':descripcion'=>$descripcion];

    $imagenAsociado = new imagenAsociado($nombre,$descripcion);
    $imagenRepository->saveLogo($imagenAsociado);
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
        
    $imagenesLogos = $imagenRepository->findAllAsociados();
    
    
    }






require 'views/asociados.view.php';

