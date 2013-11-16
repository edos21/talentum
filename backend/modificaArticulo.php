<?php
	
	include '../lib/conexion.php';
	
	try{

		$sql = 'SELECT articulos.id, articulos.articulo, articulos.descripcion, articulos.categoria, categoria.nombre, articulos.subCategoria, subcategoria.subnombre, articulos.peso FROM articulos INNER JOIN categoria ON categoria.id = articulos.categoria INNER JOIN subcategoria ON subcategoria.id = articulos.subcategoria WHERE articulos.id=:id';

		$s = $pdo->prepare($sql);
		$s->bindValue('id', $_POST['id']);
		$s->execute();

	}

	catch(PDOException $e){

		echo "Error al cargar datos";
		exit();
	}

	while ($row = $s->fetch()){

		$articulos[] = array(
			'id' => $row['id'],
			'articulo' => $row['articulo'],
			'descripcion' => $row['descripcion'],
			'categoria' => $row['categoria'],
			'nombre' => $row['nombre'],
			'subcategoria' => $row['subCategoria'],
			'subnombre' => $row['subnombre'],
			'peso' => $row['peso']
			);
	}

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
			<h2>Modificar Articulo</h2>
			<a href="modificarArticulo.php">Volver</a>
			<?php foreach($articulos as $articulo): ?>
				<form method="post" action="actualizaArticulo.php" enctype="multipart/form-data">
					<label for="articulo">Articulo</label>
					<input type="text" name="articulo" id="articulo" value="<?php echo $articulo['articulo'] ?>">
					<label for="descripcion">Descripcion</label>
					<textarea name="descripcion" id="descripcion"><?php echo $articulo['descripcion'] ?></textarea>
					<label for="categoria">Categoria</label>
					<select onChange="recargarSub(this.value)" name="categoria" id="categoria">
						<option value="<?php echo $articulo['categoria'] ?>"><?php echo $articulo['nombre'] ?></option>
						<option value="" disabled>--------------------</option>
						<?php foreach($categorias as $categoria): ?>
							<option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nombre'] ?></option>
						<?php endforeach; ?>
					</select>

					<label for="subcategoria">SubCategoria</label>
					<select name="subcategoria" id="subcategoria">
						<option value="<?php echo $articulo['subcategoria'] ?>"><?php echo $articulo['subnombre'] ?></option>
					</select>
					<label for="peso">Peso</label>
					<input type="text" id="peso" name="peso" value="<?php echo $articulo['peso'] ?>">
					<input type="hidden" name="id" value="<?php echo $articulo['id'] ?>">
					<input type="submit" value="Guardar">
				</form>
			<?php endforeach; ?>
		</div>
	</body>
</html>