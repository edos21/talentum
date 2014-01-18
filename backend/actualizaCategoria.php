<?php
	session_start()
	include '../lib/conexion.php';
	include '../lib/seguridad.php';

	$nombre = $_POST['categoria'];
	if (isset($_FILES['img']['name'])){
			$img = $_FILES['img']['name'];
		}else{
			$img="";
		}

	if ($nombre == "") 
	{
		?>

		<h2>Favor ingrese todos los datos</h2><br>
		<a href="javascript:history.back()">Volver</a>

		<?php
	}else
	if ($img == ""){
		try {

			$sql = 'UPDATE categoria SET
			nombre = :nombre WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':nombre',$nombre);
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
        <h2>Categoria Modificada</h2>
				<br>
          <a class="BtnVolver" href="menu.html.php">Volver</a>

		</center>
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>
		<?php 

	}else
	{
		try {

			$sql = 'UPDATE categoria SET
			nombre = :nombre,
			img = :img WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':nombre',$nombre);
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
<?php
	
	include ('../includes/header.html');

?>
		<center>
		<h2>Categoria Modificada</h2><br>
		<a  class="BtnVolver" href="menu.html.php">Volver</a>
		</center>
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>
		<?php 
	}

?>
