<?php

	include '../lib/conexion.php';
	
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

	<h2>SubCategoria Borrada</h2><br>
	<a href="menu.html.php">Volver</a>