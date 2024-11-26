<?php

require_once __DIR__ . "/../exceptions/QueryException.class.php";
require_once __DIR__ . "/../core/App.class.php";
require_once  "entities/imagenGaleria.class.php";
require_once  "entities/imagenAsociado.class.php";
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



        return $this->executeQuery($sql);
    }


    public function findAllAsociados()
    {

        $sql = "SELECT * from asociados";



        return $this->executeQuery($sql);
    }

    public function find(int $id): IEntity
    {
        $sql = "SELECT * from $this->table where id=$id";

        $result = $this->executeQuery($sql);

        if (empty($result)) {
            throw new NotFoundException("No se ha encontrado ningún elemento con id $id");
        }
        return $result[0];
    }

    private function executeQuery(string $sql): array
    {
        $pdoStatement = $this->connection->prepare($sql);
        if ($pdoStatement->execute() === false) {
            throw new QueryException("No se ha podido ejecutar la consulta");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }
    public function save(IEntity $entity): void
    {
        try {
            $parameters = $entity->toArray();
            $sql = sprintf('insert into %s (%s) values (%s)', $this->table, implode(', ', array_keys($parameters)), ':' . implode(',:', array_keys($parameters)));

            
            $statement = $this->connection->prepare($sql);
            
            $statement->execute($parameters);
        } catch (PDOException $exception) {
            throw new QueryException('Error al insertar en la BD');
        }
    }

    public function saveLogo(IEntity $entity): void
    {
        try {
            $parameters = $entity->toArray();
            $sql = sprintf('insert into asociados (%s) values (%s)', implode(', ', array_keys($parameters)), ':' . implode(',:', array_keys($parameters)));

            
            $statement = $this->connection->prepare($sql);
            
            $statement->execute($parameters);
        } catch (PDOException $exception) {
            throw new QueryException('Error al insertar en la BD');
        }
    }

    public function executeTransaction(callable $fnExecuteQuerys)
    {
        try {
            $this->connection->beginTransaction();
            $fnExecuteQuerys();

            $this->connection->commit();
        } catch (PDOException $exception) {
            $this->connection->rollBack();
            throw new QueryException('No se ha podido realizar la operación');
        }
    }
    private function getUpdates(array $parameters)
    {
        $updates = '';
        foreach ($parameters as $key => $value) {
            if ($key !== 'id') {

                if ($updates !== '') {
                    $updates .= ', ';
                }
                $updates .= $key . '=:' . $key;
            }
        }
        
        return $updates;
    }

    public function update(IEntity $entity): void
    {
        try{
        $parameters = $entity->toArray();
        $sql = $sql = 'UPDATE ' . $this->table . ' SET ' . $this->getUpdates($parameters) . ' WHERE id = :id';
        $statement = $this->connection->prepare($sql);
        
        
        $statement->execute($parameters);
} catch (PDOException $exception) {
    
    throw new QueryException('Error al actualizar');
    
}
    }
}
