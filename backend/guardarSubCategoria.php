<?php
	session_start();
	include '../lib/conexion.php';
	include '../lib/seguridad.php';

	$nombre = $_POST['subcategoria'];
	$categoria = $_POST['idcategoria'];
	if (isset($_FILES['img']['name'])){
			$img = $_FILES['img']['name'];
		}else{
			$img="";
		}

	if ($nombre == "" || $img== "" || $categoria == "") 
	{
		?>
<?php
	
	include ('../includes/header.html');

?>
		<center>
		<h2>Favor ingrese todos los datos</h2><br>
		<a  class="BtnVolver" href="javascript:history.back()">Volver</a>
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

			$sql = 'INSERT INTO subCategoria SET
			subnombre = :subnombre,
			img = :img,
			idCategoria = :idCategoria';

			$s = $pdo->prepare($sql);
			$s->bindValue(':subnombre',$nombre);
			$s->bindValue(':img',$img);
			$s->bindValue(':idCategoria',$categoria);
			$s->execute();

			$directorio = '../img/';
			move_uploaded_file($_FILES['img']['tmp_name'],$directorio.$img);
		?>
<?php
	
	include ('../includes/header.html');

?>
		<center>
			<h2>SubCategoria Guardada</h2><br>
			<a href="agregarSubCategoria.php">Agregar otra SubCategoria</a>
			<br>			<br>
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
