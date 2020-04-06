<?php

require_once __DIR__.'/../exceptions/AppException.php';
class App
{
    /**
    *@var array
    */

	private static $conatiner =[];

    /**
    *@param string $key
    *@param $value
    */
	public static function bind(string $key, $value)
	{
 	  static::$conatiner[$key] = $value;
	}

	/**
    *@param string $key
    *@throws AppException
    */
	public static function get(string $key)
	{
		if (! array_key_exists($key, static::$conatiner))
			throw new AppException("No se ha encontrado la $key en el contenedor");

		return  static::$conatiner[$key];
	}

	/**
    *@return mixed
    *@throws AppException
    */
	public static function getConnnection()
	{
		if (! array_key_exists('connection', static::$conatiner))
			static::$conatiner['connection'] = Connection::make();

		return  static::$conatiner['connection'];
	}

}
