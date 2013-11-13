<!Doctype html>
<html>
	<head>
		<title>Talemtum Joyas | Categorias</title>
	</head>
	<body>
		<div id="content">
			<h2>Agregar Categoria</h2>
			<a href="menu.html.php">Volver</a>
			<form method="post" action="guardarCategoria.php">
				<label for="categoria">Nombre de la Categoria</label>
				<input type="text" name="categoria" id="categoria">
				<label for="img">Imagen</label>
				<input type="file" name="img" id="img">
				<input type="submit" value="Guardar">
			</form>
		</div>
	</body>
</html>