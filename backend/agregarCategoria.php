<?php
	
	include ('../includes/header.html');

?>
		<div id="content">
			<h2>Agregar Categoria</h2>
			<a href="menu.html.php"><img src="../img/iconadmin/add.png" alt=""> Volver</a><br>
	
			<div class="grid_4">
			<form method="post" action="guardarCategoria.php" enctype="multipart/form-data">
				<label for="categoria">Nombre de la Categoria</label>
				<input type="text" name="categoria" id="categoria"><br>
				<label for="img">Imagen</label>
				<input type="file" name="img" id="img" accept="image/*"><br>
				<input type="submit" value="Guardar">
			</form>
			</div>
		
		</div>
<?php

	include ('../includes/footer.html');

?>