<?php
	require_once 'utils/utils.php';
	require_once 'exceptions/FileException.php';
	require_once 'utils/File.php';
	require_once 'entity/ImagenGaleria.php';


	$errores=[];
	$descripcion='';
	$mensaje='';


    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {

    	try {
			$descripcion = trim(htmlspecialchars($_POST['descripcion']));

			$tiposAceptados=['image/jpeg','image/png','image/gif'];	
			$imagen = new File('imagen', $tiposAceptados);
			$imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
			$imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
    		$mensaje = 'Datos Enviados';
		} catch (FileException $fileException) {
			$errores=$fileException->getMessage();
		}
    
    }
    require 'views/galeria.view.php';
?>
