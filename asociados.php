<?php
	require_once 'utils/utils.php';
	require_once 'exceptions/FileException.php';
	require_once 'exceptions/ValidationException.php';
	require_once 'utils/File.php';
	require_once 'entity/Asociado.php';


	$errores=[];
	
try {
    	if($_SERVER['REQUEST_METHOD'] === 'POST')
    	{
			$nombre = trim(htmlspecialchars($_POST['nombre']));
			if (empty($nombre))
				throw new ValidationException('El nombre no puede quedar vacio');

			$descripcion = trim(htmlspecialchars($_POST['descripcion']));

			$tiposAceptados=['image/jpeg','image/png','image/gif'];	
			$imagenFile = new File('logo', $tiposAceptados);

			$imagenFile->saveUploadFile(Asociado::RUTA_IMAGENES_ASOCIADOS);
		
			$asociado = New Asociado($nombre, $imagenFile->getFileName(), $descripcion);

    		$mensaje = "Se ha guardado el Asociado".$asociado->getNombre();
    		$descripcion='';
    		$nombre='';

	    }

	} 
	catch (FileException $fileException) {
			$errores=$fileException->getMessage();
	}
	catch (ValidationException $ValidationException) {
			$errores=$ValidationException->getMessage();
	}
    
    require 'views/asociados.view.php';



?>
