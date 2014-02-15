<?php
	session_start();
	include '../lib/conexion.php';
	include '../lib/seguridad.php';
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

			<h2>Modificar / Eliminar SubCategoria</h2>
      <div class="push_10">
          <a class="BtnVolver" href="menu.html.php">Volver</a>
        </div>
        <center>
			<table width="400px"  border="0" cellpadding="10">
				<thead>
					<tr>
						<th width="100"><b>SubCategoria</b></th>
						<th width="100"><b>Categoria</b></th>
						<th width="100"><b>Opciones</b></th>
						<th width="100"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($subcategorias as $subcategoria): ?>
						<tr>
							<td><?php echo $subcategoria['subnombre']; ?></td>
							<td><?php echo $subcategoria['nombre']; ?></td>
							<td colspan="2">
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
			</center>

<?php

	include ('../includes/footer.html');

?>
