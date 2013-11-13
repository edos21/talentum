<?php

	include '../lib/conexion.php';

	$nombre = $_POST['categoria'];
	if (isset($_POST['img'])){
			$img = $_POST['img'];
		}else{
			$img="";
		}

	if ($nombre == "" || $img== "") 
	{
		?>

		<h2>Favor ingrese todos los datos</h2><br>
		<a href="agregarCategoria.php">Volver</a>

		<?php
	}else
	{
		try{

			$sql = 'INSERT INTO categoria SET
			nombre = :nombre,
			img = :img';

			$s = $pdo->prepare($sql);
			$s->bindValue(':nombre',$nombre);
			$s->bindValue(':img',$img);
			$s->execute();

		?>

			<h2>Categoria Guardada</h2><br>
			<a href="menu.html.php">Volver</a>

		<?php
		}

		catch(PDOException $e){

			echo "Ha ocurrido un error";
			exit();

		}
	}

?>