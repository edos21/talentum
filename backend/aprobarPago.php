<?php

	include '../lib/conexion.php';

		try {

			$sql = 'UPDATE pagos SET
			estado = :estado WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':estado','Aprobado');
			$s->bindValue(':id',$_POST['id']);
			$s->execute();
					
		} catch (PDOException $e) {
			
			echo "Error al Modificar";
			exit();
		}

		?>	

		<h2>Pago Aprobado</h2><br>
		<a href="movimientoEspera.php">Continuar Aprobando Movimientos</a><br>
		<a href="menu.html.php">Ir al Menu</a>