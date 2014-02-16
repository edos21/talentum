<?php
	session_start();
	include '../lib/conexion.php';
	include '../lib/seguridad.php';

	$descripcion = $_POST['descripcion'];
	$monto = $_POST['monto'];

	if ($descripcion == "" || $monto== "") 
	{
		?>
<?php
	
	include ('../includes/header.php');

?>
		<center>
		<h2>Favor ingrese todos los datos</h2><br>
		<a  class="BtnVolver"  href="javascript:history.back()">Volver</a>
		</center>
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>
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
<?php
	
	include ('../includes/header.php');

?>
		<center>
		<h2>Precio Modificado</h2><br>
		<a class="BtnVolver" href="menu.html.php">Volver</a>
		</center>
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>
		<?php 

	}

?>
