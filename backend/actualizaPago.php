<?php

	include '../lib/conexion.php';

	try {

		$sql = 'UPDATE pagos SET
		tipo = :tipo,
		ndocumento = :ndocumento,
		monto = :monto,
		observacion = :observacion,
		estado = :estado WHERE
		id = :id';

		$s = $pdo->prepare($sql);
		$s->bindValue(':tipo',$_POST['tipo']);
		$s->bindValue(':ndocumento',$_POST['ndocumento']);
		$s->bindValue(':observacion',$_POST['observacion']);
		$s->bindValue(':monto',$_POST['monto']);
		$s->bindValue(':estado',$_POST['estado']);
		$s->bindValue(':id',$_POST['id']);
		$s->execute();
				
	} catch (PDOException $e) {
		
		echo "Error al Modificar".$e;
		exit();
	}

	?>	

	<h2>Pago Modificado</h2><br>
	<a href="modificarMovimientos.php">Volver a Modificar Movimientos</a><br>
	<a href="menu.html.php">Ir al Menu</a>