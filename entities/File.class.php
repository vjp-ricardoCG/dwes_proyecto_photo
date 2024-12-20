
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

                throw new FileException("Debes seleccionar un fichero ");

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

        public function saveUploadFile(string $rutaDestino){

            if(is_uploaded_file($this->file['tmp_name'])===false){
                throw new FileException("El archivo no se ha subido mediante el formulario");
            }


            $this->fileName=$this->file['name'];
            $ruta=$rutaDestino.$this->fileName;

            if(is_file($ruta)){

                    $i=1;

                    $cadena = $this->fileName;
                    while(is_file($ruta)){

                        $this->fileName="(".($i++).")".$cadena;
                         $ruta=$rutaDestino.$this->fileName;


                    }

               
                


            }
            if(move_uploaded_file($this->file['tmp_name'],$ruta)===false){

                throw new FileException("No se puede mover el fichero a su destino");
            }

            
        }

        public function copyFile (string $rutaOrigen, string $rutaDestino){

            $origen = $rutaOrigen.$this->fileName;
            $destino = $rutaDestino.$this->fileName;

            if(is_file($origen)===false){
                throw new FileException("No existe el fichero $origen que intentas copiar");
            }
            if(is_file($destino)===true){
                throw new FileException("El fichero $destino ya existe y no se puede sobreescribir");
            }
            if(copy($origen,$destino)===false){
                throw new FileException("No se ha podido copiar el fichero $origen a $destino");

            }

                
        }


    }

?>