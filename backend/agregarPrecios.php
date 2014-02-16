<?php
	session_start();
	include '../lib/seguridad.php';
	include ('../includes/header.php');

?>

			<h2>Agregar Precios</h2>
        <div class="push_10">
          <a class="BtnVolver" href="menu.html.php">Volver</a>
        </div>
			<form method="post" action="guardarPrecios.php">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" id="descripcion">
				<label for="monto">Monto</label>
				<input type="text" name="monto" id="monto">
         <br>      
         <br>      
        <input class="BtnGuardar" type="submit" value="Guardar">
             
			</form>
	<div class="clearfix"></div>
<?php

	include ('../includes/footer.html');

?>
