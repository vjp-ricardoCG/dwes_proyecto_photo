<?php
require 'utils/utils.php';
$arrayCampos= [];
$arrayErrores=[];
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $array_error = [];
    $array_mostrarDatos = [];

    $firstName = $_POST['FirstName'] ;
    $lastName = $_POST['LastName'] ;
    $email = $_POST['Email'] ;
    $subject = $_POST['Subject'] ;
    $message = $_POST['Message'] ;


    if (empty($firstName)) {
        $array_error[] = "El campo First Name no puede estar vacío";
    }
    if (empty($email)) {
        $array_error[] = "El campo Email no puede estar vacío";
    }
    if (empty($subject)) {
        $array_error[] = "El campo subject no puede estar vacío";
    }

    if (empty($array_error)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $array_error[] = "Email incorrecto";
        } else {
            $array_mostrarDatos[] = "First Name: $firstName";

            if (!empty($apellido)) {
                $array_mostrarDatos[] = "Second name: $apellido";
            }

            $array_mostrarDatos[] = "Email: $email";
            $array_mostrarDatos[] = "Subject: $subject";

            if (!empty($mensaje)) {
                $array_mostrarDatos[] = "Message: $mensaje";
            }
        }
    }

    // $mensaje = new Mensaje($firstName, $apellido, $email, $subject, $mensaje);
    // $mensajeRepository->save($mensaje);
   

   
}
require 'views/contact.view.php';

?>


