<?php
	
	include '../lib/conexion.php';
	include '../lib/seguridad.php';

	$id = $_POST['id'];
	
	try{

		$sql = 'SELECT * FROM subcategoria INNER JOIN categoria ON categoria.id = subcategoria.idcategoria WHERE subcategoria.id=:id';

		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();

	}

	catch(PDOException $e){

		echo "Error al cargar datos";
		exit();
	}

	while ($row = $s->fetch()){

		$subcategorias[] = array(
			'id' => $row['id'],
			'subnombre' => $row['subnombre'],
			'img' => $row['img'],
			'idCategoria'=> $row['idCategoria'],
			'nombre'=>$row['nombre']);
	}

	try{

		$sql = 'SELECT * FROM categoria';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e){
		echo "Error al cargar categorias";
		exit();
	}
	while($row = $s->fetch()){
		$categorias[] = array(
			'id'=>$row['id'],
			'nombre'=>$row['nombre']);
	}

?>

<?php
	
	include ('../includes/header.html');

?>

			<h2>Modificar SubCategoria</h2>
			        <div class="push_10">
          <a class="BtnVolver" href="modificarSubCategoria.php">Volver</a>
        </div>

			<?php foreach($subcategorias as $subcategoria): ?>
				<form method="post" action="actualizaSubCategoria.php" enctype="multipart/form-data">
					<label for="subcategoria">Nombre de la SubCategoria</label>
					<input type="text" name="subcategoria" id="subcategoria" value="<?php echo $subcategoria['subnombre'] ?>"> <br>
					<label for="img">Imagen</label>
					<input type="file" name="img" id="img" accept="image/*">
					<label for="idcategoria">Categoria</label>
					<select name="idcategoria" id="idcategoria">
						<option value="<?php echo $subcategoria['idCategoria'] ?>"><?php echo $subcategoria['nombre'] ?></option>
						<option value="" disabled>--------------------</option>
						<?php foreach($categorias as $categoria): ?>
						<option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nombre'] ?></option>
						<?php endforeach; ?>
					</select>
					<input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="Botonera">
                  <input type="submit" value="Guardar">
                </div>
				</form>
			<?php endforeach; ?>

<?php

	include ('../includes/footer.html');

?>
