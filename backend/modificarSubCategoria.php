<?php

	include '../lib/conexion.php';

	try{

		$sql= 'SELECT subcategoria.id, subcategoria.subnombre, categoria.nombre FROM subcategoria INNER JOIN categoria ON categoria.id = subcategoria.idcategoria ORDER BY subcategoria.id DESC';

		$s = $pdo->prepare($sql);
		$s->execute();

	}

	catch(PDOException $e){

		echo "Error al cargar las subcategorias";
		exit();
	}

	while ($row = $s->fetch()) {
		
		$subcategorias[] = array(
			'id' => $row['id'],
			'subnombre' => $row['subnombre'],
			'nombre' => $row['nombre']);
	}

?>
<?php
	
	include ('../includes/header.html');

?>
		<div id="content">
			<h2>Modificar / Eliminar SubCategoria</h2>
			<a href="menu.html.php">Volver</a>
			<table border="1">
				<thead>
					<tr>
						<th>SubCategoria</th>
						<th>Categoria</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($subcategorias as $subcategoria): ?>
						<tr>
							<td><?php echo $subcategoria['subnombre']; ?></td>
							<td><?php echo $subcategoria['nombre']; ?></td>
							<td>
								<form action="modificaSubCategoria.php" method="post">
									<input type="hidden" name="id" value="<?php echo $subcategoria['id'];?>">
									<input type="submit" value="Modificar">
								</form>
								<form action="eliminaSubCategoria.php" method="post">
									<input type="hidden" name="id" value="<?php echo $subcategoria['id'];?>">
									<input type="submit" value="Eliminar">
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
<?php

	include ('../includes/footer.html');

?>