<?php

	include '../lib/conexion.php';

	$nombre = $_POST['subcategoria'];
	$categoria = $_POST['idcategoria'];
	if (isset($_POST['img'])){
			$img = $_POST['img'];
		}else{
			$img="";
		}

	if ($nombre == "" || $img== "" || $categoria == "") 
	{
		?>

		<h2>Favor ingrese todos los datos</h2><br>
		<a href="agregarSubCategoria.php">Volver</a>

		<?php
	}else
	{
		try{

			$sql = 'INSERT INTO subCategoria SET
			subnombre = :subnombre,
			img = :img,
			idCategoria = :idCategoria';

			$s = $pdo->prepare($sql);
			$s->bindValue(':subnombre',$nombre);
			$s->bindValue(':img',$img);
			$s->bindValue(':idCategoria',$categoria);
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