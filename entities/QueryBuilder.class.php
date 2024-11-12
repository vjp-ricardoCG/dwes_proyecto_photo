<?php

require __DIR__ . "/../exceptions/QueryException.class.php";
require_once __DIR__ . "/../core/App.class.php";
abstract class QueryBuilder
{


    private $connection;


    private $table;


    private $classEntity;

    public function __construct(string $table, string $classEntity)
    {
        $this->table = $table;
        $this->classEntity = $classEntity;
        $this->connection = App::getConnection();
    }


    public function findAll()
    {

        $sql = "SELECT * from $this->table";



        $pdoStatement = $this->connection->prepare($sql);



        if ($pdoStatement->execute() === false) {

            throw new QueryException("No se ha podido ejecutar la consulta");
        };

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    public function save(IEntity $entity): void
    {
        try {
            $parameters = $entity->toArray();
            $sql = sprintf('insert into %s (%s) values (%s)', $this->table, implode(', ', array_keys($parameters)), ':' . implode(',:', array_keys($parameters)));


        $statement =$this->connection->prepare($sql);
        $statement->execute($parameters);

        } catch (PDOException $exception) {
            throw new QueryException('Error al insertar en la BD');
        }
    }
}
