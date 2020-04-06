<?php
//'mysql:host=curso-php7.local;dbname:cursophp7;charset=utf8;','userCurso','php',$opciones
//$connection = new PDO('mysql:host=localhost;dbname:cursophp7;charset=utf8','userCurso','php',$opciones);

require_once __DIR__.'/../core/App.php';

class Connection
{

	/**
    *@return PDO
    *@throws AppException
    */
	public static function make()
	{
		try
		{
			$config = App::get('config')['database'];
			$connection = new PDO(
				$config['connection'].';dbname='.$config['name'],$config['username'],$config['password'],$config['options']);
		}
		catch (PDOException $PDOException)
		{
			throw new AppException("No se ha podido conectar a la Base de Datos");

			die($PDOException->getMessage());
		}
		return $connection;
	}
}