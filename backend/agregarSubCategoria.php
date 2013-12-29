<?php

	include '../lib/conexion.php';

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

			<h2>Agregar SubCategoria</h2>
        <div class="push_10">
          <a class="BtnVolver" href="menu.html.php">Volver</a>
        </div>
			<form method="post" action="guardarSubCategoria.php" enctype="multipart/form-data"> <br>
				<label for="subcategoria">Nombre de la SubCategoria</label>
				<input type="text" name="subcategoria" id="subcategoria"><br>
				<label for="img">Imagen</label>
				<input type="file" name="img" id="img" accept="image/*"><br>
				<label for="idcategoria">Categoria</label>
				<select name="idcategoria" id="idcategoria">
					<option value="">Seleccione...</option>
					<?php foreach($categorias as $categoria): ?>
					<option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nombre'] ?></option>
					<?php endforeach; ?>
				</select> <br> <br>
				<div class="Botonera" >
           <input type="submit" value="Guardar">
        </div>
			</form>

<?php

	include ('../includes/footer.html');

?>