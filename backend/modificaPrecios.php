<?php
	
	include '../lib/conexion.php';
	
	try{

		$sql = 'SELECT * FROM precios WHERE id=:id';

		$s = $pdo->prepare($sql);
		$s->bindValue('id', $_POST['id']);
		$s->execute();

	}

	catch(PDOException $e){

		echo "Error al cargar datos";
		exit();
	}

	while ($row = $s->fetch()){

		$precios[] = array(
			'id' => $row['id'],
			'descripcion' => $row['descripcion'],
			'monto' => $row['monto']);
	}
?>

<!Doctype html>
<html>
	<head>
		<title>Talemtum Joyas | Precios</title>
	</head>
	<body>
		<div id="content">
			<h2>Modificar Precios</h2>
			<a href="modificarPrecios.php">Volver</a>
			<?php foreach($precios as $precio): ?>
				<form method="post" action="actualizaPrecio.php">
					<label for="descripcion">Descripcion</label>
					<input type="text" name="descripcion" id="descripcion" value="<?php echo $precio['descripcion'] ?>">
					<label for="monto">Monto</label>
					<input type="text" name="monto" id="monto" value="<?php echo $precio['monto'] ?>">
					<input type="hidden" name="id" value="<?php echo $precio['id'];?>">
					<input type="submit" value="Guardar">
				</form>
			<?php endforeach; ?>
		</div>
	</body>
</html>