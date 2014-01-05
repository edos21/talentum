<?php 
error_reporting(0);
include '../lib/conexion.php';
include '../lib/seguridad.php';

	try{

		$sql= 'SELECT * FROM clientes';

		$s = $pdo->prepare($sql);
		$s->execute();

	}

	catch(PDOException $e){

		echo "Error al cargar las categorias";
		exit();
	}

	while ($row = $s->fetch()) {
		
		$clientes[] = array(
			'correo' => $row['correo']);
	}

include '../includes/header.html'; ?>

<form action="modificaMovimiento.php" method="post">
	<label>Correo del cliente a Modificar</label>
	<input type="text" name="correo" id="correo" list="correos" autocomplete="off">
	<datalist id="correos">
		<?php foreach($clientes as $cliente): ?>
		<option value="<?= $cliente['correo'] ?>">
		<?php endforeach; ?>
	</datalist>
	<input type="submit" value="Buscar">
</form>


<?php include '../includes/footer.html'; ?>
