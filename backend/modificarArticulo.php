<?php

	include '../lib/conexion.php';

	try{

		$sql= 'SELECT articulos.id, articulos.articulo, categoria.nombre FROM articulos INNER JOIN categoria ON categoria.id = articulos.categoria ORDER BY articulos.id DESC';

		$s = $pdo->prepare($sql);
		$s->execute();

	}

	catch(PDOException $e){

		echo "Error al cargar las articulos";
		exit();
	}

	while ($row = $s->fetch()) {
		
		$articulos[] = array(
			'id' => $row['id'],
			'articulo' => $row['articulo'],
			'nombre' => $row['nombre']);
	}

?>
<!Doctype html>
<html>
	<head>
		<title>Talemtum Joyas | Articulos</title>
	</head>
	<body>
		<div id="content">
			<h2>Modificar / Eliminar Articulos</h2>
			<a href="menu.html.php">Volver</a>
			<table border="1">
				<thead>
					<tr>
						<th>Articulos</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($articulos as $articulo): ?>
						<tr>
							<td><?php echo $articulo['articulo']." (".$articulo['nombre'].")"; ?></td>
							<td>
								<form action="modificaArticulo.php" method="post">
									<input type="hidden" name="id" value="<?php echo $articulo['id'];?>">
									<input type="submit" value="Modificar">
								</form>
								<form action="eliminaArticulo.php" method="post">
									<input type="hidden" name="id" value="<?php echo $articulo['id'];?>">
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