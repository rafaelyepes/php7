<?php 
include __DIR__.'/partials/inicio-doc.part.php';
include __DIR__.'/partials/nav.part.php'; 
?>
<!-- Principal Content Start -->
   <div id="galeria">
     <div class="container">
      <div class="col-xs-12 col-sm-8 col-ss-push-2">
      	<h1>Galeria</h1>
      	<hr>
      	<?php include __DIR__.'/partials/show-error.part.php'; ?>
      	<form class="form-horizontal" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<div class="col-xs-12">
					<label class="label-control">Imagen</span>
					<input class="form-control-file" type="file" name="imagen">
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="label-control">Categoria</span>
					<select class="form-control" name="categoria">
					 <?php foreach($categorias as $categoria): ?>
					 	<option class="form-control" value="<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></option>

					<?php endforeach; ?>	    	
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
 					<label class="label-control">Descripcion</span>
 					<textarea  class="form-control" name="descripcion"><?= $descripcion ?></textarea>
					<button class="pull-right btn btn-lg sr-button">Enviar</button>
				</div>
			</div>
      	</form>
		<hr class="divider">
        <div class="imagenes_galeria">
        	<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Imagen</th>
 		          <th scope="col">Categorias</th>
			      <th scope="col">Visualizaciones</th>
			      <th scope="col">Likes</th>
			      <th scope="col">Descargas</th>
			    
			    </tr>
			  </thead>
			  <tbody>
			  <?php foreach(($imagenes ?? []) as $imagen): ?>
 				  <tr>
			      <th scope="row"><?= $imagen->getId()?></th>
			      <td><img src="<?= $imagen->getUrlGallery()?>"
              		 	  alt="<?= $imagen->getDescripcion() ?>" 
              		 	  title="<?= $imagen->getDescripcion() ?>"
              		 	  style="width: 100px;">
			      </td>
  		          <td><?= $imgRepository->getCategoria($imagen)->getNombre()?></td>
			      <td><?= $imagen->getNumVisualizaciones()?></td>
			      <td><?= $imagen->getNumLikes()?></td>
				  <td><?= $imagen->getNumDownloads()?></td>
			      </tr>
			  <?php endforeach; ?>	    
			  </tbody>
			</table>	
        </div>
      </div>
     </div>
   </div>
<!-- End of Principal Content Start --> 

<?php include __DIR__.'/partials/fin-doc.part.php'; ?>
