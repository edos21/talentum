<?php

	include '../lib/conexion.php';

	$subnombre = $_POST['subcategoria'];
	if (isset($_FILES['img']['name'])){
			$img = $_FILES['img']['name'];
		}else{
			$img="";
		}

	if ($subnombre == "") 
	{
		?>

		<h2>Favor ingrese todos los datos</h2><br>
		<a href="javascript:history.back()">Volver</a>

		<?php
	} else
	if ($img == ""){
		try {

			$sql = 'UPDATE subcategoria SET
			subnombre =  :subnombre,
			idcategoria = :idcategoria WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':subnombre',$subnombre);
			$s->bindValue(':idcategoria',$_POST['idcategoria']);
			$s->bindValue(':id',$_POST['id']);
			$s->execute();
					
		} catch (PDOException $e) {
			
			echo "Error al Modificar".$e;
			exit();
		}

		?>	

		<h2>SubCategoria Modificada</h2><br>
		<a href="menu.html.php">Volver</a>

		<?php 

	}else
	{
		try {

			$sql = 'UPDATE subcategoria SET
			subnombre = :subnombre,
			idcategoria = :idcategoria,
			img = :img WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':subnombre',$subnombre);
			$s->bindValue(':idcategoria',$_POST['idcategoria']);
			$s->bindValue(':img',$img);
			$s->bindValue(':id',$_POST['id']);
			$s->execute();

			$directorio = '../img/';
			move_uploaded_file($_FILES['img']['tmp_name'],$directorio.$img);
					
		} catch (PDOException $e) {
			
			echo "Error al Modificar";
			exit();
		}

		?>	

		<h2>SubCategoria Modificada</h2><br>
		<a href="menu.html.php">Volver</a>

		<?php 
	}

?>