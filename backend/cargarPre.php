<?php
	session_start();
	include '../lib/conexion.php';

	try{

		$sql = 'SELECT * FROM precios WHERE id =:id';

		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_GET['id']);
		$s->execute();
	}

	catch(PDOException $e){
		echo "Error al cargar precios".$e;
		exit();
	}

	if($row = $s->fetch()){ 
		$monto = $row['monto'];
	} 

	try{

		$sql = 'SELECT * FROM precios WHERE descripcion =:descripcion';

		$s = $pdo->prepare($sql);
		$s->bindValue(':descripcion', $_GET['oro']);
		$s->execute();
	}

	catch(PDOException $e){
		echo "Error al cargar precios".$e;
		exit();
	}

	if($row = $s->fetch()){ 
		$oro = $row['monto'];
	} 

	echo $monto+$oro;
?>