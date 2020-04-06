<?php

require_once __DIR__.'/../database/Querybuilder.php';

class CategoriaRepository extends Querybuilder{
	/**
	 * Class Constructor
	 */
	public function __construct(string $table='categorías', string $classEntity='Categoria' )
	{
		parent::__construct($table, $classEntity);
		
	}

	/**
	* @param Categoria $categoria
	* @throws QueryException
	*/
	public function nuevaImagen(Categoria $categoria)
	{
		$categoria->setNumImagenes($categoria->getNumImagenes()+1);

		$this->update($categoria);
	}
}