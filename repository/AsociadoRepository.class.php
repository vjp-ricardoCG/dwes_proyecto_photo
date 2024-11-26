<?php

require_once 'entities/QueryBuilder.class.php';

class AsociadoRepository extends QueryBuilder {
    public function __construct(string $table = 'asociados',string $classEntity = 'Asociado') 
    {
        parent::__construct($table,$classEntity);
        echo$classEntity;
    }
    
}

?>