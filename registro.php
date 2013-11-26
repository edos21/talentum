<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Talemtum Joyas | Registro</title>
</head>
<body>
	<?php
		if (isset($_GET['error'])) {
	?>
		<h2>Favor Introduzca todos los campos Necesarios</h2>
	<?php
		}
	?>
	<form action="registrar.php" method="POST">
		<label for="correo">Correo*</label>
		<input type="mail" name="correo" id="correo" placeholder="ejemplo@dominio.com">
		<label for="clave">Contrase&ntilde;a*</label>
		<input type="password" name="clave" id="clave">
		<span>La clave debe tener mas de 8 caracteres</span>
		<label for="cclave">Repetir Contrase&ntilde;a*</label>
		<input type="password" name="cclave" id="cclave">
		<label for="rif">Rif/Cedula</label>
		<input type="text" name="rif" id="rif">
		<label for="nombre">Razon Social/Nombre*</label>
		<input type="text" name="nombre" id="nombre">
		<label for="direccion">Direcci&oacute;n</label>
		<textarea name="direccion" id="direccion"></textarea>
		<label for="telefono">Telefono</label>
		<input type="text" name="telefono" id="telefono">
		<label for="celular">Celular</label>
		<input type="text" name="celular" id="celular">
		<input type="submit" value="Registrar">
	</form>
</body>
</html>