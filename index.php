<?php

require 'utils/bootstrap.php';





 require 'utils/routes.php';


try  {

require Router::load('utils/routes.php')->direct(Request::uri(),Request::method());

}catch(NotFoundException $exception){
    die($exception->getMessage());
}







?>