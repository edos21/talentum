

<?php

	include '../lib/conexion.php';

	try{

		$sql= 'SELECT * FROM categoria ORDER BY id DESC';

		$s = $pdo->prepare($sql);
		$s->execute();

	}

	catch(PDOException $e){

		echo "Error al cargar las categorias";
		exit();
	}

	while ($row = $s->fetch()) {
		
		$categorias[] = array(
			'id' => $row['id'],
			'nombre' => $row['nombre']);
	}

?>
<?php
	
	include ('../includes/header.html');

?>

	<body>
		<div id="content">
			<h2>Modificar / Eliminar Categoria</h2>
			<a href="menu.html.php">Volver</a>
			<table border="1">
				<thead>
					<tr>
						<th>Categoria</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($categorias as $categoria): ?>
						<tr>
							<td><?php echo $categoria['nombre']; ?></td>
							<td>
								<form action="modificaCategoria.php" method="post">
									<input type="hidden" name="id" value="<?php echo $categoria['id'];?>">
									<input type="submit" value="Modificar">
								</form>
								<form action="eliminaCategoria.php" method="post">
									<input type="hidden" name="id" value="<?php echo $categoria['id'];?>">
									<input type="submit" value="Eliminar">
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</body>
<?php

	include ('../includes/footer.html');

?>