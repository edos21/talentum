<?php
	session_start();
	include '../lib/seguridad.php';
	include ('../includes/header.php');

?>

			<h2>Agregar Categoria</h2>
        <div class="push_10">
          <a class="BtnVolver" href="menu.html.php">Volver</a>
        </div>
	
			<div class="grid_11">
			<form method="post" action="guardarCategoria.php" enctype="multipart/form-data">
				<label for="categoria">Nombre de la Categoria</label>
				<input type="text" name="categoria" id="categoria"><br>
				<label for="img">Imagen</label>
				<input type="file" name="img" id="img" accept="image/*"><br>
                <div class="Botonera" >
                  <input class="BtnGuardar" type="submit" value="Guardar">
                </div>
			</form>
			
			
			</div>
			<div class="clearfix"></div>
		

<?php

	include ('../includes/footer.html');

?>
