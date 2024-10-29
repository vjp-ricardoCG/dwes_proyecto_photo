
<?php

    require __DIR__."/../exceptions/FileException.class.php";
    class File{


        private $file;


        private $fileName;

            /**
             *
             * File constructor .
             * @param string $fileName
             * @param array $file
             * @throws FileException
             */

        public function __construct(string $fileName,array $arrTypes  ){

            $this->file = $_FILES[$fileName];
            $this->fileName = "";



            if (!isset($this->file)){

                throw new FileException("Debes selecciones un fichero ");

            }

            if($this->file['error'] !== UPLOAD_ERR_OK){


                switch($this->file['error']){
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:{
                        
                        throw new FileException("El fichero es demasiado grande  ");
                        break;

                    }case UPLOAD_ERR_PARTIAL:{
                        throw new FileException("No se ha podido subi el fichero completo");
                        break;
                    }    
                    default:{
                        throw new FileException("No se ha podido subir el fichero");
                        break;
                    }
                }
            }

            if(in_array($this->file['type'],$arrTypes)===false){

                throw new FileException("Tipo de fichero no soportado ");

            }


            

        }

        public function getFileName(){
                return $this->fileName;
        }




    }

?>