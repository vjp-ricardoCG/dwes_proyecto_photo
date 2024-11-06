<?php

require __DIR__."/../exceptions/QueryException.class.php";
class QueryBuilder{


private $connection;

public function __construct(PDO $connection){

    $this->connection=$connection;
}


public function findAll(string $table, string $classEntity){

$sql = "SELECT * from $table";



$pdoStatement = $this -> connection -> prepare($sql);



if($pdoStatement -> execute() === false){

throw new QueryException("No se ha podido ejecutar la consulta");
};

return $pdoStatement->fetchAll(PDO::FETCH_CLASS |PDO::FETCH_PROPS_LATE, $classEntity);


}

}