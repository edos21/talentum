<?php

	include '../lib/conexion.php';
	
	try{

		$sql = 'DELETE FROM articulos WHERE id = :id';

		$s = $pdo->prepare($sql);
		$s->bindValue(':id',$_POST['id']);
		$s->execute();

	}
	catch(PDOException $e){
		echo "Ha ocurrido un error al eliminar";
		exit();
	}

?>

	<h2>Articulo Borrado</h2><br>
	<a href="menu.html.php">Volver</a>