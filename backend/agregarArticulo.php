<?php

	include '../lib/conexion.php';

	try{
		$sql= 'SELECT * FROM categoria';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e){
		echo "error al cargar categorias";
		exit();
	}
	while($row = $s->fetch()){
		$categorias[] = array(
			'id' => $row['id'],
			'nombre' => $row['nombre']);
	}

?>
<!Doctype html>
<html>
	<head>
		<title>Talemtum Joyas | Articulos</title>
		<script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript">
		function recargarSub(val){
 
			   $('#subcategoria').html('<option value="">Cargando...</option>');

			   $.ajax({
					url: 'cargarSub.php',
					data: 'id='+val,
					success: function(resp){
					 $('#subcategoria').html(resp)
					 }
				});
			}
		</script>
	</head>
	<body>
		<div id="content">
			<h2>Agregar Articulos</h2>
			<a href="menu.html.php">Volver</a>
			<form method="post" action="guardarArticulo.php">
				<label for="articulo">Articulo</label>
				<input type="text" name="articulo" id="articulo">
				<label for="descripcion">Descripcion</label>
				<textarea name="descripcion" id="descripcion"></textarea>
				<label for="categoria">Categoria</label>
				<select onChange="recargarSub(this.value)" name="categoria" id="categoria">
					<option value="">Seleccione...</option>
					<?php foreach($categorias as $categoria): ?>
						<option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nombre'] ?></option>
					<?php endforeach; ?>
				</select>

				<label for="subcategoria">SubCategoria</label>
				<select name="subcategoria" id="subcategoria">
					<option value="">Seleccione...</option>
				</select>
				<label for="peso">Peso</label>
				<input type="peso" id="peso" name="peso">
				<label for="foto1">Foto 1</label>
				<input type="file" name="foto1" id="foto1">
				<label for="joya1">Joya 1</label>
				<input type="file" name="joya1" id="joya1">

				<label for="foto2">Foto 2</label>
				<input type="file" name="foto2" id="foto2">
				<label for="joya2">Joya 2</label>
				<input type="file" name="joya2" id="joya2">

				<label for="foto3">Foto 3</label>
				<input type="file" name="foto3" id="foto3">
				<label for="joya3">Joya 3</label>
				<input type="file" name="joya3" id="joya3">

				<label for="foto4">Foto 4</label>
				<input type="file" name="foto4" id="foto4">
				<label for="joya4">Joya 4</label>
				<input type="file" name="joya4" id="joya4">
				<input type="submit" value="Guardar">
			</form>
		</div>
	</body>
</html>