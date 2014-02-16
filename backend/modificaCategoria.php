<?php
	session_start();
	include '../lib/conexion.php';
	include '../lib/seguridad.php';
	
	try{

		$sql = 'SELECT * FROM categoria WHERE id=:id';

		$s = $pdo->prepare($sql);
		$s->bindValue('id', $_POST['id']);
		$s->execute();

	}

	catch(PDOException $e){

		echo "Error al cargar datos";
		exit();
	}

	while ($row = $s->fetch()){

		$categorias[] = array(
			'id' => $row['id'],
			'nombre' => $row['nombre'],
			'img' => $row['img']);
	}
?>

<?php
	
	include ('../includes/header.php');

?>

			<h2>Modificar Categoria</h2>
			        <div class="push_10">
          <a class="BtnVolver" href="modificarCategoria.php">Volver</a>
        </div>
			<?php foreach($categorias as $categoria): ?>
				<form method="post" action="actualizaCategoria.php" enctype="multipart/form-data">
					<label for="categoria">Nombre de la Categoria</label>
					<input type="text" name="categoria" id="categoria" value="<?php echo $categoria['nombre'] ?>">
					<label for="img">Imagen</label>
					<input type="file" name="img" id="img" accept="image/*">
					<input type="hidden" name="id" value="<?php echo $categoria['id'];?>">
					
           <br>
           <br>
                  <input  class="BtnGuardar" type="submit" value="Guardar">
   
				</form>
				<div class="clearfix"></div>
			<?php endforeach; ?>

<?php

	include ('../includes/footer.html');

?>
