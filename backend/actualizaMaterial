<?php
	session_start();
	include '../lib/conexion.php';
	include '../lib/seguridad.php';

	if ($_POST['precio'] == "") 
	{
		?>
<?php
	
	include ('../includes/header.html');

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

			$sql = 'UPDATE materiales SET
			precio = :precio,
			estado = :estado WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':precio',$_POST['precio']);
			$s->bindValue(':estado',$_POST['estado']);
			$s->bindValue(':id',$_POST['id']);
			$s->execute();
					
		} catch (PDOException $e) {
			
			echo "Error al Modificar";
			exit();
		}

		?>	
<?php
	
	include ('../includes/header.html');

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
