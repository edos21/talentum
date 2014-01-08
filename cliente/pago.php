<?php

session_start();

include '../lib/conexion.php';
include '../lib/seguridadcliente.php';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Talemtum Joyas | Pagos</title>
</head>
<body>
	<h2>Registrar Pagos</h2>
	<form action="pagar.php" method="post">
	<?php
		if (isset($_GET['error'])) {
	?>
		<h2>Error, Favor verifique haber llenado todos los campos obligatorios</h2>
		<input type="hidden" name="error">
	<?php
		}
	?>
		<label for="tipo">Forma de Pago*</label>
		<select name="tipo" id="tipo">
			<option value="">Seleccione...</option>
			<option>Deposito</option>
			<option>Transferencia</option>
		</select>
		<label for="ndocumento">Nro de Documento*</label>
		<input type="text" name="ndocumento" id="ndocumento">
		<label for="monto">Monto*</label>
		<input type="text" name="monto" id="monto">
		<label for="observaciones">Observaciones</label>
		<textarea name="observaciones" id="observaciones" cols="30" rows="10"></textarea>
		<input type="submit" value="Pagar">
	</form>
</body>
</html>
