<?php

session_start();

include 'lib/conexion.php';
include 'lib/seguridad.php';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Talemtum Joyas | Compra</title>
</head>
<body>
	<p>¿Seguro de Solicitar el articulo?</p>
	<img src="img/productos/<?=$_POST['foto']?>">
	<p>De talla <b><?=$_POST['talla']?></b> y Oro <b><?=$_POST['oro']?></b></p>
	<p>Observaciones: <?=$_POST['observaciones']?></p>
	<form action="comprar.php" method="post">
		<input type="hidden" name="id" value="<?=$_POST['iditem']?>">
		<input type="hidden" name="foto" value="<?=$_POST['foto']?>">
		<input type="hidden" name="talla" value="<?=$_POST['talla']?>">
		<input type="hidden" name="oro" value="<?=$_POST['oro']?>">
		<input type="hidden" name="observaciones" value="<?=$_POST['observaciones']?>">
		<input type="submit" value="Aceptar">
		<a href="javascript: history.back()">Cancelar</a>
	</form>
	<p>Al momento de confirmar su pedido, le enviaremos un correo a <b><?=$_SESSION['correo']?></b></p>
</body>
</html>