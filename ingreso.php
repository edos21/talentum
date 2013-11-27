<form action="ingresar.php" method="post">
<?php
	if (isset($_GET['error'])) {
?>
	<h2>Su correo y Contrase&ntilde;a no coinciden, por favor, verifique</h2>
	<input type="hidden" name="error">
<?php
	}
?>
<?php
	if (isset($_GET['sesion'])) {
?>
	<h2>Por favor Inicie Sesion o Registrese</h2>
<?php
	}
?>
	<label for="correo">Correo</label>
	<input type="mail" name="correo" id="correo">
	<label for="clave">Contrase&ntilde;a</label>
	<input type="password" name="clave" id="clave">
	<input type="submit" value="Ingresar">
</form>
<a href="registro.php">Registrarse</a>