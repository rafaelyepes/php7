<?php
    require 'utils/utils.php';
    require 'views/index.view.php';
    require 'entity/ImagenGaleria.php';

    $imagenGaleria = new ImagenGaleria('imagen1','Descripcion de La imagen');

    echo ($imagenGaleria);
?>
