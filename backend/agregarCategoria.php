<!Doctype html>
<html>
	<head>
		<title>Talemtum Joyas | Categorias</title>
	</head>
	<body>
		<div id="content">
			<h2>Agregar Categoria</h2>
			<a href="menu.html.php">Volver</a>
			<form method="post" action="guardarCategoria.php" enctype="multipart/form-data">
				<label for="categoria">Nombre de la Categoria</label>
				<input type="text" name="categoria" id="categoria">
				<label for="img">Imagen</label>
				<input type="file" name="img" id="img" accept="image/*">
				<input type="submit" value="Guardar">
			</form>
		</div>
	</body>
</html>