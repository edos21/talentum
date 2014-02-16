<?php
	session_start();
	include '../lib/conexion.php';
	include '../lib/seguridad.php';

	$articulo = $_POST['articulo'];
	$categoria = $_POST['categoria'];
	$subcategoria = $_POST['subcategoria'];

	if ($articulo == "" || $categoria == "" || $subcategoria == "") 
	{
		?>

		<h2>Favor ingrese todos los datos</h2><br>
		<a class="BtnVolver" href="javascript:history.back()">Volver</a>

		<?php
	}else{
		try {

			$sql = 'UPDATE articulos SET
			articulo = :articulo,
			descripcion = :descripcion,
			categoria = :categoria,
			subcategoria = :subcategoria,
			peso = :peso WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':articulo',$articulo);
			$s->bindValue(':descripcion',$_POST['descripcion']);
			$s->bindValue(':categoria',$categoria);
			$s->bindValue(':subcategoria',$subcategoria);
			$s->bindValue(':peso',$_POST['peso']);
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
		<h2>Categoria Modificada</h2><br>


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
