<?php
	session_start()
	include '../lib/conexion.php';
	include '../lib/seguridad.php';

	try{

		$sql= 'SELECT * FROM precios ORDER BY id DESC';

		$s = $pdo->prepare($sql);
		$s->execute();

	}

	catch(PDOException $e){

		echo "Error al cargar los precios";
		exit();
	}

	while ($row = $s->fetch()) {
		
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
			<h2>Modificar / Eliminar Precios</h2>
<br>
                  <a class="BtnVolver" href="menu.html.php">Volver</a>
<br>
			<table class="TablaEstilo" border="0">
				<thead>
					<tr>
						<th>Descipcion</th>
						<th>Monto</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($precios as $precio): ?>
						<tr>
							<td><?php echo $precio['descripcion']; ?></td>
							<td><?php echo $precio['monto']; ?></td>
							<td>
								<form action="modificaPrecios.php" method="post">
									<input type="hidden" name="id" value="<?php echo $precio['id'];?>">
									<input type="submit" value="Modificar">
								</form>
								<form action="eliminaPrecios.php" method="post">
									<input type="hidden" name="id" value="<?php echo $precio['id'];?>">
									<input type="submit" value="Eliminar">
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</center>
		
		
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>
