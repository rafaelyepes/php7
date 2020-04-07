<?php
   
    require 'entity/ImagenGaleria.php';
    require 'entity/Asociado.php';
    require 'utils/utils.php';
    require_once 'database/Connection.php';
    require_once 'database/Querybuilder.php';
    require_once 'entity/ImagenGaleria.php';
    require_once 'repository/ImagenGaleriaRepository.php';
   
    $imgRepository = new ImagenGaleriaRepository();
    $imagenes = $imgRepository->findAll();
   

    $imagenGaleria = new ImagenGaleria('imagen1','Descripcion de La imagen');

    $imagenes =[
        new ImagenGaleria('1.jpg', 'Descripcion imagen 1','50', '0', '35'),
        new ImagenGaleria('2.jpg', 'Descripcion imagen 2','50', '0', '35'),
        new ImagenGaleria('3.jpg', 'Descripcion imagen 3','50', '0', '35'),
        new ImagenGaleria('4.jpg', 'Descripcion imagen 4','50', '0', '35'),  
        new ImagenGaleria('5.jpg', 'Descripcion imagen 5','50', '0', '35'),
        new ImagenGaleria('6.jpg', 'Descripcion imagen 6','50', '0', '35'),
        new ImagenGaleria('7.jpg', 'Descripcion imagen 7','50', '0', '35'),
        new ImagenGaleria('8.jpg', 'Descripcion imagen 8','50', '0', '35'),
        new ImagenGaleria('9.jpg', 'Descripcion imagen 9','50', '0', '35'),
        new ImagenGaleria('10.jpg','Descripcion imagen 10','50','0', '35'),  
        new ImagenGaleria('11.jpg','Descripcion imagen 11','50', '0', '35'),
        new ImagenGaleria('12.jpg','Descripcion imagen 12','50', '0', '35'),

    ];
 

    $asociados =[
    	new Asociado('Primer Asociado', 'log1.jpg', 'Descripcion Primer Asociado'),
    	new Asociado('Segundo Asociado', 'log2.jpg', 'Descripcion Segundo Asociado'),
    	new Asociado('Tercer Asociado', 'log3.jpg', 'Descripcion Tercer Asociado'),
    	new Asociado('Cuarto Asociado', 'log4.jpg', 'Descripcion Cuarto Asociado'),
    	new Asociado('Quinto Asociado', 'log5.jpg', 'Descripcion Quinto Asociado'),
    	new Asociado('Sexto Asociado', 'log6.jpg', 'Descripcion Sexto Asociado'),
    ];
 
   $asociados = obtenerArrayReducido($asociados, 3);
   require __DIR__ . '/../../views/index.view.php';

?>
