<?php

session_start();

include 'lib/conexion.php';
include 'lib/seguridad.php';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Talemtum Joyas | Pagos</title>
</head>
<body>
	<?php
		if ($_POST['tipo']=="" || $_POST['ndocumento']=="" || $_POST['monto']==""){
			if (isset($_POST['error'])){
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				header('Location: ' . $_SERVER['HTTP_REFERER']."?error");
			}
		}else{
	?>
	<p>¿Seguro de realizar el siguiente pago?</p>
	<p><b><?=$_POST['tipo']?></b> Nro: <b><?=$_POST['ndocumento']?></b>, por un monto de <b><?=$_POST['monto']?></b></p>
	<p>Observaciones: <?=$_POST['observaciones']?></p>
	<form action="realizarpago.php" method="post">
		<input type="hidden" name="tipo" value="<?=$_POST['tipo']?>">
		<input type="hidden" name="ndocumento" value="<?=$_POST['ndocumento']?>">
		<input type="hidden" name="monto" value="<?=$_POST['monto']?>">
		<input type="hidden" name="observaciones" value="<?=$_POST['observaciones']?>">
		<input type="submit" value="Aceptar">
		<a href="javascript: history.back()">Cancelar</a>
	</form>
	<p>Al momento de confirmar su pago, le enviaremos un correo a <b><?=$_SESSION['correo']?></b></p>
	<?php } ?>
</body>
</html>