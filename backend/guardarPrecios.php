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
	}else
	{
		try{

			$sql = 'INSERT INTO precios SET
			descripcion = :descripcion,
			monto = :monto';

			$s = $pdo->prepare($sql);
			$s->bindValue(':descripcion',$descripcion);
			$s->bindValue(':monto',$monto);
			$s->execute();

		?>

			<h2>Precio Guardado</h2><br>
			<a href="agregarPrecios.php">Agregar otro Precio</a>
			<a href="menu.html.php">Volver al menu</a>

		<?php
		}

		catch(PDOException $e){

			echo "Ha ocurrido un error";
			exit();

		}
	}

?>