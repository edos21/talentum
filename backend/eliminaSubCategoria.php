<?php
	session_start()
	include '../lib/conexion.php';
	include '../lib/seguridad.php';
	
	try{

		$sql = 'DELETE FROM subcategoria WHERE id = :id';

		$s = $pdo->prepare($sql);
		$s->bindValue(':id',$_POST['id']);
		$s->execute();

	}
	catch(PDOException $e){
		echo "Ha ocurrido un error al eliminar";
		exit();
	}

?>
<?php
	
	include ('../includes/header.php');

?>
		<center>
	<h2>SubCategoria Borrada</h2><br>
	<a class="BtnVolver" href="menu.html.php">Volver</a>
		</center>
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>
