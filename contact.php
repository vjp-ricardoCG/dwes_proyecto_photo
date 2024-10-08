<?php
$arrayCampos= [];
$arrayErrores=[];
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  

    $firstName = $_POST['FirstName'] ;
   $lastName = $_POST['LastName'] ;
 $email = $_POST['Email'] ;
   $subject = $_POST['Subject'] ;
   $message = $_POST['Message'] ;


   if (  empty($firstName) ){
     $arrayErrores[0]="Falta el campo FirstName";
   }
   if (  empty($email) ){
    $arrayErrores[2]="Falta el campo Email";
  }
  if (  empty($subject) ){
    $arrayErrores[3]="Falta el campo Subject";
  }
    $arrayCampos[0]=$firstName;
   $arrayCampos[1]=$lastName;
    $arrayCampos[2]=$email;
    $arrayCampos[3]=$subject;
    $arrayCampos[4]=$message;
   

   
}
require 'views/contact.view.php';

?>


