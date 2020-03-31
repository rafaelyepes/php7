<?php

class ImagenGaleria
{
    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    /**
    * @var string
    */
    private $nombre;
    /**
    * @var string
    */
    private $descripcion;
    /**
    * @var int
    */
    private $numVisualizaciones;
    /**
    * @var int
    */
    private $numLikes;
    /**
    * @var int
    */
    private $numDounliads;


    /**
     * Class Constructor
     * @param string   $nombre   
     * @param string   $descripcion   
     * @param int   $numVisualizaciones   
     * @param int   $numLikes   
     * @param int   $numDounliads   
     */
    public function __construct($nombre, $descripcion, $numVisualizaciones=0, $numLikes=0, $numDounliads=0)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDounliads = $numDounliads;
    }

    public function __toString()
    {
        return $this->getDescripcion();
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumVisualizaciones()
    {
        return $this->numVisualizaciones;
    }

    /**
     * @param int $numVisualizaciones
     *
     * @return self
     */
    public function setNumVisualizaciones($numVisualizaciones)
    {
        $this->numVisualizaciones = $numVisualizaciones;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumLikes()
    {
        return $this->numLikes;
    }

    /**
     * @param int $numLikes
     *
     * @return self
     */
    public function setNumLikes($numLikes)
    {
        $this->numLikes = $numLikes;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumDounliads()
    {
        return $this->numDounliads;
    }

    /**
     * @param int $numDounliads
     *
     * @return self
     */
    public function setNumDounliads($numDounliads)
    {
        $this->numDounliads = $numDounliads;

        return $this;
    }
    public function getUrlPortfolio()
    {
        return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
    }
    public function getUrlGallery()
    {
        return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
    }

}

?>