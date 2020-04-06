<?php

require_once __DIR__.'/../database/IEntity.php';

class ImagenGaleria implements IEntity
{
    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

     /**
    * @var int
    */
    private $id;
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
    private $numDownloads;

    /**
    * @var int
    */
    private $categoria;


    /**
     * Class Constructor
     * @param string   $nombre   
     * @param string   $descripcion   
     * @param int   $numVisualizaciones   
     * @param int   $numLikes   
     * @param int   $numDownloads   
     * @param int   $categoria   
     */
    public function __construct($nombre="", $descripcion="", $categoria=0, $numVisualizaciones=0, $numLikes=0, $numDownloads=0)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
        $this->categoria = $categoria;
    }

    public function __toString()
    {
        return $this->getDescripcion();
    }

     /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
    public function getNumDownloads()
    {
        return $this->numDownloads;
    }

    /**
     * @param int $numDownloads
     *
     * @return self
     */
    public function setNumDownloads($numDownloads)
    {
        $this->numDownloads = $numDownloads;

        return $this;
    }

      /**
     * @return int
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param int $categoria
     *
     * @return self
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

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

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'numVisualizaciones' => $this->getNumVisualizaciones(),
            'numLikes' => $this->getNumLikes(),
            'numDownloads' => $this->getNumDownloads(),
            'categoria' => $this->getCategoria()
        ];
    }
}

?>