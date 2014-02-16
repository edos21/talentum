<?php
	session_start();
	include '../lib/conexion.php';
	include '../lib/seguridad.php';

	$nombre = $_POST['categoria'];
	if (isset($_FILES['img']['name'])){
			$img = $_FILES['img']['name'];
		}else{
			$img="";
		}

	if ($nombre == "" || $img== "") 
	{
		?>
<?php
	
	include ('../includes/header.php');

?>
		<center>
		<h2>Favor ingrese todos los datos</h2><br>
		<a class="BtnVolver" href="javascript:history.back()">Volver</a>
	</center>
		<br>
		<br>
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

			$directorio = '../img/';
			move_uploaded_file($_FILES['img']['tmp_name'],$directorio.$img);
		?>
<?php
	
	include ('../includes/header.php');

?>
<center>
			<h2>Categoria Guardada</h2><br>
			<a href="agregarCategoria.php">Agregar otra Categoria</a>
			<a class="BtnVolver" href="menu.html.php">Volver al menu</a>
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
