<?php

	include '../lib/conexion.php';

	$nombre = $_POST['nombre'];

	if ($nombre == "") 
	{
		if (isset($_POST['error'])){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			header('Location: ' . $_SERVER['HTTP_REFERER']."?error");
		}
	}else{
		try {

			$sql = 'UPDATE clientes SET
			nombre = :nombre,
			rif = :rif,
			direccion = :direccion,
			telefono = :telefono,
			celular = :celular WHERE
			id = :id';

			$s = $pdo->prepare($sql);
			$s->bindValue(':nombre',$nombre);
			$s->bindValue(':rif',$_POST['rif']);
			$s->bindValue(':direccion',$_POST['direccion']);
			$s->bindValue(':telefono',$_POST['telefono']);
			$s->bindValue(':celular',$_POST['celular']);
			$s->bindValue(':id',$_POST['id']);
			$s->execute();
					
		} catch (PDOException $e) {
			
			echo "Error al Modificar";
			exit();
		}

		if (isset($_POST['guardado'])){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			header('Location: ' . $_SERVER['HTTP_REFERER']."?guardado");
		}

	}

?>