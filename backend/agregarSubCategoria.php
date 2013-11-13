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
<!Doctype html>
<html>
	<head>
		<title>Talemtum Joyas | SubCategorias</title>
	</head>
	<body>
		<div id="content">
			<h2>Agregar SubCategoria</h2>
			<a href="menu.html.php">Volver</a>
			<form method="post" action="guardarSubCategoria.php">
				<label for="subcategoria">Nombre de la SubCategoria</label>
				<input type="text" name="subcategoria" id="subcategoria">
				<label for="img">Imagen</label>
				<input type="file" name="img" id="img">
				<label for="idcategoria">Categoria</label>
				<select name="idcategoria" id="idcategoria">
					<option value="">Seleccione...</option>
					<?php foreach($categorias as $categoria): ?>
					<option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nombre'] ?></option>
					<?php endforeach; ?>
				</select>
				<input type="submit" value="Guardar">
			</form>
		</div>
	</body>
</html>