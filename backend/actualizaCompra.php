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
			talla = :talla,
			oro = :oro,
			observacion = :observacion,
			precio = :precio,
			costo = :costo,
			estado = :estado WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':talla',$_POST['talla']);
			$s->bindValue(':oro',$_POST['oro']);
			$s->bindValue(':observacion',$_POST['observacion']);
			$s->bindValue(':precio',$precio);
			$s->bindValue(':costo',$_POST['costo']);
			$s->bindValue(':estado',$_POST['estado']);
			$s->bindValue(':id',$_POST['id']);
			$s->execute();
					
		} catch (PDOException $e) {
			
			echo "Error al Modificar".$e;
			exit();
		}

		?>	

		<h2>Movimiento Modificado</h2><br>
		<a href="modificarMovimientos.php">Volver a Modificar Movimientos</a><br>
		<a href="menu.html.php">Ir al Menu</a>

		<?php 

	}

?>