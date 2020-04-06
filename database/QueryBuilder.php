<?php

require_once __DIR__.'/../exceptions/QueryException.php';
require_once __DIR__.'/../exceptions/NoFoundException.php';

require_once __DIR__.'/../core/App.php';

abstract class Querybuilder
{
	/**
	*@var PDO
	*/
	private $connection;

	/**
	*@var string
	*/
	private $table;

	/**
	*@var string
	*/
	private $classEntity;



	/**
	 * Class Constructor
	 * @param PDO   $connection   
	 */
	public function __construct(string $table, string $classEntity)
	{
		$this->connection = App::getConnnection();
		$this->table = $table;
		$this->classEntity = $classEntity;
	}

	private function executeQuery(string $sql): array
	{
		//consultas preparadas
		$pdoStatement=$this->connection->prepare($sql);

		if ($pdoStatement->execute() === false)
			throw new QueryException("No se ha podido ejecutar la query Solicitada");

			return $pdoStatement->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $this->classEntity);
	}

	/**
	* @param string $table
	* @param string $classEntity
	* @return array
	* @throws QueryException
	*/

	public function findAll() : array
	{
		$sql = "SELECT * FROM $this->table";

		//$this->$connection->query($sql); es vunerable a ataques sql injection.
		return $this->executeQuery($sql);
		
	}

	public function find(int $id): IEntity
	{
		$sql = "SELECT * FROM $this->table WHERE id=$id";
		$result = $this->executeQuery($sql);

		if (empty($result))
			throw new NoFoundException("No se ha encontrado ningun elemento con id $id");
		return $result[0];
	}	
	/**
	* @param IEntity $entity
	* @throws QueryException
	*/
	public function save(IEntity $entity): void
	{
		try
		{
			$parameters = $entity->toArray();
			$formato = 'INSERT INTO %s (%s) VALUES (%s)';
			$sql =sprintf($formato, $this->table,  implode(', ', array_keys($parameters)), ':'.implode(', :', array_keys($parameters)));

			$statement = $this->connection->prepare($sql);
			$statement->execute($parameters);

		}
		catch (PDOException $exception)
		{
			throw new QueryException("Error al insertar en la Base de datos");
		}
	}

	/**
	* @param array $parameters
	* @return $string
	*/

    public function getUpdates(array $parameters)
	{
		$updates='';

		foreach ($parameters as $key => $value) 
		{
			if ($key !== 'id')
			{	
				if ($updates !== '')
					$updates .= ', ';
				$updates .= $key . '=:' . $key;	
			}	
		}
		return $updates;
	}		

    public function update(IEntity $entity): void
	{
		try
		{
			$parameters = $entity->toArray();
		
			$sql =sprintf('UPDATE %s SET %s WHERE id=:id', $this->table,$this->getUpdates($parameters));

			$statement = $this->connection->prepare($sql);
			$statement->execute($parameters);

		}
		catch (PDOException $exception)
		{
			throw new QueryException('Error al Actualizar elementos con id '.$parameters['id']);
		}
	}

	public function executeTransaction(callable $fnExecuteQuerys)
	{
		try
		{
			$this->connection->beginTransaction();

			$fnExecuteQuerys();

			$this->connection->commit();

		}
		catch (PDOException $exception)
		{
			$this->connection->rollBack();

			throw new QueryException("No se ha podido realizar la operacion");

		}
	}		

	


}
