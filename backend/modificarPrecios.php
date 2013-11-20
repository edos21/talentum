<?php

	include '../lib/conexion.php';

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
<!Doctype html>
<html>
	<head>
		<title>Talemtum Joyas | Precios</title>
	</head>
	<body>
		<div id="content">
			<h2>Modificar / Eliminar Precios</h2>
			<a href="menu.html.php">Volver</a>
			<table border="1">
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
		</div>
	</body>
</html>