<?php

	include '../lib/conexion.php';

	$descripcion = $_POST['descripcion'];
	$monto = $_POST['monto'];

	if ($descripcion == "" || $monto== "") 
	{
		?>

		<h2>Favor ingrese todos los datos</h2><br>
		<a href="javascript:history.back()">Volver</a>

		<?php
	}else{
		try {

			$sql = 'UPDATE precios SET
			descripcion = :descripcion,
			monto = :monto WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':descripcion',$descripcion);
			$s->bindValue(':monto',$monto);
			$s->bindValue(':id',$_POST['id']);
			$s->execute();
					
		} catch (PDOException $e) {
			
			echo "Error al Modificar";
			exit();
		}

		?>	

		<h2>Precio Modificado</h2><br>
		<a href="menu.html.php">Volver</a>

		<?php 

	}

?>