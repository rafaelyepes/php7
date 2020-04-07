<?php

class Router
{
	private $routes;


	/**
	 * Class Constructor
	 * @param    $routes   
	 */
	private function __construct()
	{
		$this->routes = [
			'GET'=>[],
			'POST'=>[]
		];
	}

	/**
    * @param string $file
    * @return Router;
    */

	public static function load(string $file):Router
	{
		$router = new Router();

		require $file;

		return $router;
	}


	/**
    * @param string $uri
    * @param string $controller
    */

	public function get(string $uri, string $controller):void
	{
		$this->routes['GET'][$uri] = $controller;
	}


	/**
    * @param string $uri
    * @param string $controller
    */
	public function post(string $uri, string $controller):void
	{
		$this->routes['POST'][$uri] = $controller;
	}

	/**
    * @param string $uri
    * @param string $method
    * @return string
    * @throws NoFoundException
    */
	public function direct(string $uri, string $method):string
	{
		if (array_key_exists($uri, $this->routes[$method]))
			return $this->routes[$method][$uri];

		throw new NoFoundException('No se ha definido uan ruta para la uri solicitada');

	}

	 /**
    * @param string $path
    */
	public function redirect(string $path):string
	{
		header ('location: /'.$path);

	}
}	