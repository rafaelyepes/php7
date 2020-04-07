<?php
	require_once 'utils/utils.php';
	require_once 'exceptions/FileException.php';
	require_once 'exceptions/QueryException.php';
	require_once 'exceptions/validationException.php';
	require_once 'utils/File.php';
	require_once 'entity/ImagenGaleria.php';
	require_once 'entity/Categoria.php';
	require_once 'repository/ImagenGaleriaRepository.php';
	require_once 'repository/CategoriaRepository.php';
	require_once 'database/Connection.php';
	require_once 'database/Querybuilder.php';
	require_once 'core/App.php';
	
	


	
try {
	
	$imgRepository = new ImagenGaleriaRepository();
	
	
			$descripcion = trim(htmlspecialchars($_POST['descripcion']));
			
			if (empty($categoria))
				throw new ValidationException("No se ha Recibido La Categoria");

			$tiposAceptados=['image/jpeg','image/png','image/gif'];	
			$imagen = new File('imagen', $tiposAceptados);
			$imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
			$imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

			$imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);

			$imgRepository->save($imagenGaleria);
			//$imgRepository->guarda($imagenGaleria);

} 
catch (FileException $fileException) {
			die($fileException->getMessage());
}

catch (QueryException $queryException) {
			die($queryException->getMessage());
}

catch (ValidationException $validationException) {
			die($validationException->getMessage());
}

App::get('router')->redirect('imagenes-galeria');
?>
