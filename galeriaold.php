<?php
	require_once 'utils/utils.php';
	require_once 'exceptions/FileException.php';
	require_once 'exceptions/QueryException.php';
	require_once 'exceptions/AppException.php';
	require_once 'utils/File.php';
	require_once 'entity/ImagenGaleria.php';
	require_once 'database/Connection.php';
	require_once 'database/Querybuilder.php';
	require_once 'core/App.php';
	
	


	$errores=[];
	$descripcion='';
	$mensaje='';

try {
	
	$config = require_once 'app/config.php';
	App::bind('config', $config);
	$connection = App::getConnnection();

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
			$descripcion = trim(htmlspecialchars($_POST['descripcion']));

			$tiposAceptados=['image/jpeg','image/png','image/gif'];	
			$imagen = new File('imagen', $tiposAceptados);
			$imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
			$imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

			//consultas preparadas: ayuda a evitar ataques sql inyector, sentencia reu

			
/*			$sql = "INSERT INTO imagenes (nombre, descripcion) values (?, ?)";
			pdoStatement->bindParam(1,'Valor');
			pdoStatement->bindParam(2,'descripcion');
			if ($connection->execute($parameters) === false)
*/
			$sql = "INSERT INTO imagenes (nombre, descripcion) values (:nombre, :descripcion)";

		
			$pdoStatement = $connection->prepare($sql);  
			$parameters = [':nombre'=>$imagen->getFileName(),'descripcion'=>$descripcion];

/*
			$sql = "INSERT INTO imagenes (nombre, descripcion) values ('".$imagen->getFileName()."', '$descripcion')";
			$sql = $connection->quote($sql);
*/			

			if ($pdoStatement->execute($parameters) === false)
				$errores = "No se ha podido guardar la imagen en la base de datos";
			else
			{
				$descripcion=''; 	
	    		$mensaje = 'Se ha guardado la imagen';
			}	
    }

    $queryBuilder = new QueryBuilder('imagenes','ImagenGaleria');
    $imagenes = $queryBuilder->findAll();
} 
catch (FileException $fileException) {
			$errores=$fileException->getMessage();
}
catch (QueryException $queryException) {
			$errores=$queryException->getMessage();
}
catch (AppException $appException) {
			$errores=$appException->getMessage();
}
    require 'views/galeria.view.php';
?>
