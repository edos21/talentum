<?php
	
	include ('../includes/header.html');

?>
		<div id="content">
			<h2>Agregar Precios</h2>
			<a href="menu.html.php">Volver</a>
			<form method="post" action="guardarPrecios.php">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" id="descripcion">
				<label for="monto">Monto</label>
				<input type="text" name="monto" id="monto">
				<input type="submit" value="Guardar">
			</form>
		</div>
<?php

	include ('../includes/footer.html');

?>