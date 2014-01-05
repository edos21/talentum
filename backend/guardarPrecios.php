<?php

	include '../lib/conexion.php';
	include '../lib/seguridad.php';
	
	$descripcion = $_POST['descripcion'];
	$monto = $_POST['monto'];

	if ($descripcion == "" || $monto== "") 
	{
		?>
<?php
	
	include ('../includes/header.html');

?>
		<center>
		<h2>Favor ingrese todos los datos</h2><br>
		<a class="BtnVolver" href="javascript:history.back()">Volver</a>
		</center>
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>
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
<?php
	
	include ('../includes/header.html');

?>
		<center>
			<h2>Precio Guardado</h2><br>
			<a href="agregarPrecios.php">Agregar otro Precio</a><br><br>
			<a class="BtnVolver" href="menu.html.php">Volver</a>
		</center>
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>
		<?php
		}

		catch(PDOException $e){

			echo "Ha ocurrido un error";
			exit();

		}
	}

?>
