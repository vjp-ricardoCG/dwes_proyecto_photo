<?php
require_once "database/IEntity.class.php";
class imagenAsociado implements IEntity{

    
    const RUTA_IMAGENES_GALLERY ='images/index/';

    private $id;
private $nombre;
private $descripcion;




public function __construct(string $nombre="", string $descripcion=""){

$this->nombre= $nombre;
$this->descripcion= $descripcion;


}

public function toArray(): array{
    return[
        'id'=>$this->getId(),
        'nombre'=>$this->getNombre(),
        'descripcion'=>$this->getDescripcion()
    ];
}

public function getNombre():string {
    return $this->nombre;
}

public function getId(){
    return $this->id;
}


public function setNombre(string $nombre):void {
    $this->nombre =$nombre;
}

public function getDescripcion():string {
    return $this->descripcion;
}



public function getUrlGallery():string {
    return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
    
}







    



}




?>