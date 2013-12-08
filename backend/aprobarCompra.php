<?php

	include '../lib/conexion.php';

	$precio = $_POST['precio'];

	if ($precio == "") 
	{
		?>

		<h2>Favor ingrese el precio</h2><br>
		<a href="javascript:history.back()">Volver</a>

		<?php
	}else{
		try {

			$sql = 'UPDATE compra SET
			precio = :precio,
			costo = :costo,
			estado = :estado WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':precio',$precio);
			$s->bindValue(':costo',$_POST['costo']);
			$s->bindValue(':estado','Aprobado');
			$s->bindValue(':id',$_POST['id']);
			$s->execute();
					
		} catch (PDOException $e) {
			
			echo "Error al Modificar";
			exit();
		}

		?>	

		<h2>Compra Aprobada</h2><br>
		<a href="movimientoEspera.php">Continuar Aprobando Movimientos</a><br>
		<a href="menu.html.php">Ir al Menu</a>

		<?php 

	}

?>