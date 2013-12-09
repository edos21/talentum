<?php

	include '../lib/conexion.php';
	
	try{

		$sql = 'DELETE FROM pagos WHERE id = :id';

		$s = $pdo->prepare($sql);
		$s->bindValue(':id',$_POST['id']);
		$s->execute();

	}
	catch(PDOException $e){
		echo "Ha ocurrido un error al eliminar";
		exit();
	}

?>

	<h2>Pago Borrado</h2><br>
	<a href="modificarMovimientos.php">Volver a Modificar Movimientos</a><br>
	<a href="menu.html.php">Volver</a>