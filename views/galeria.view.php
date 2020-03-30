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
      	<?php if($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
      		<div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
	      		<button type="button" class="close" data-dismiss="alert" aria-label"Close"><span aria-hiddden="true"></span>
	      		</button>
	      		<?php if(empty($errores)) : ?>
	      			<p><?= $mensaje ?></p>
				<?php else: ?>
					<ul>
						<?php foreach ($errores as $error):?>
							<li><?= $error ?></li>
						<?php endforeach; ?>	
					</ul>
				<?php endif; ?>
			</div>
      	<?php endif; ?>

      	<form class="form-horizontal" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<div class="col-xs-12">
					<label class="label-control">Imagen</span>
					<input class="form-control-file" type="file" name="imagen">
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
        <div class="imagenes_galeria"></div>
      </div>
     </div>
   </div>
<!-- End of Principal Content Start --> 

<?php include __DIR__.'/partials/fin-doc.part.php'; ?>
