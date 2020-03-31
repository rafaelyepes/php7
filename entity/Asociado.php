<?php

class Asociado
{

    const RUTA_IMAGENES_ASOCIADOS = 'images/index/asociados/';

	private $nombre;
	private $logo;
	private $descripcion;


	/**
	 * Class Constructor
	 * @param string $nombre   
	 * @param string $logo   
	 * @param string $descripcion   
	 */
	public function __construct(string $nombre, string $logo, string $descripcion)
	{
		$this->nombre = $nombre;
		$this->logo = $logo;
		$this->descripcion = $descripcion;
	}

	/**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     *
     * @return self
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getUrlAsociados()
    {
        return self::RUTA_IMAGENES_ASOCIADOS.$this->getLogo();
    }



}
