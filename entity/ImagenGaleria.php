<?php

namespace;

class ImagenGaleria
{
    
        
	private String $nombre;
	private String $descripcion;
    private int $numVisualizaciones;
    private int $numLikes;
	private int $numDounliads;

	

	public function __construct(String $nombre, String $descripcion, int $numVisualizaciones, int $numLikes, int $numDounliads)
	{
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->numVisualizaciones = $numVisualizaciones;
		$this->numLikes = $numLikes;
		$this->numDounliads = $numDounliads;

	}


	public String getNombre() {
		return this.$nombre;
	}

	public void set$Nombre(String $nombre) {
		this.$nombre = $nombre;
	}

	public String get$Descripcion() {
		return this.$descripcion;
	}

	public void set$Descripcion(String $descripcion) {
		this.$descripcion = $descripcion;
	}

	public int get$NumVisualizaciones() {
		return this.$numVisualizaciones;
	}

	public void set$NumVisualizaciones(int $numVisualizaciones) {
		this.$numVisualizaciones = $numVisualizaciones;
	}

	public int get$NumLikes() {
		return this.$numLikes;
	}

	public void set$NumLikes(int $numLikes) {
		this.$numLikes = $numLikes;
	}

	public int get$NumDounliads() {
		return this.$numDounliads;
	}

	public void set$NumDounliads(int $numDounliads) {
		this.$numDounliads = $numDounliads;
	}

	
}
