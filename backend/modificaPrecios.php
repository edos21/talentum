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

<?php
	
	include ('../includes/header.html');

?>
		<center>
			<h2>Modificar Precios</h2>
			<br>
			<a class="BtnVolver" href="modificarPrecios.php">Volver</a>
			<br>
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
		</center>
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>