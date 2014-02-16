<?php
	session_start();
	include '../lib/conexion.php';
	include '../lib/seguridad.php';

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
<?php
	
	include ('../includes/header.php');

?>
		<center>
		<h2>Pago Aprobado</h2><br>
		<a href="movimientoEspera.php">Continuar Aprobando Movimientos</a><br>
		<a class="BtnVolver" href="menu.html.php">Ir al Menu</a>
		</center>
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>
