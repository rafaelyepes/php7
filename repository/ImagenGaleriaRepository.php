<?php

require_once __DIR__.'/../database/Querybuilder.php';

class ImagenGaleriaRepository extends Querybuilder{

	/**
	 * Class Constructor
	 */
	public function __construct(string $table='imagenes', string $classEntity='ImagenGaleria' )
	{
		parent::__construct($table, $classEntity);
		
	}


	/**
	* @param ImagenGaleria $imagenGaleria
	* @return Categoria
	* @throws NoFoundException
	* @throws QueryException
	*/
	public function getCategoria(ImagenGaleria $imagenGaleria) : Categoria
	{
		$categoriaRepository = new CategoriaRepository();

		return $categoriaRepository->find($imagenGaleria->getCategoria());
	}


	/**
	* @param ImagenGaleria $imagenGaleria
	* @throws QueryException
	*/
	public function guarda(ImagenGaleria $imagenGaleria)
	{
		$fnGuardaImagen = function () use ($imagenGaleria) //funcion anonima
		{
			$categoria = $this->getCategoria($imagenGaleria);	
			$categoriaRepository = new CategoriaRepository();
			$categoriaRepository->nuevaImagen($categoria);
			
			$this->save($imagenGaleria);
		};

		$this->executeTransaction($fnGuardaImagen);

	}

}