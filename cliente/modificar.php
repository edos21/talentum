<?php

session_start();

include '../lib/conexion.php';
include '../lib/seguridadcliente.php';

//buscar el id en funcion de su correo
try{

	$sql= 'SELECT * FROM clientes WHERE
	correo=:correo';

	$s = $pdo->prepare($sql);
	$s->bindValue(':correo',$_SESSION['correo']);
	$s->execute();
}

catch(PDOException $e){
	echo "Error al cargar clientes";
	exit();
}

while($row = $s->fetch()){
	$clientes[] = array(
		'id' => $row['id'],
		'rif' => $row['rif'],
		'nombre' => $row['nombre'],
		'direccion' => $row['direccion'],
		'telefono' => $row['telefono'],
		'celular' => $row['celular']
	);
}

?>
<form action="modifica.php" method="POST">
	<?php
		if (isset($_GET['error'])) {
	?>
		<h2>Error, Favor verifique que todos los datos estan correctamente llenados o que no se encuentra registrado</h2>
		<input type="hidden" name="error">
	<?php
		}
		if (isset($_GET['guardado'])) {
		?>
		<h2>Datos Modificados Correctamente</h2>
		<input type="hidden" name="guardado">
		<?php
		}
		foreach($clientes as $cliente): ?>  
        <label for="nombre">Razon Social/Nombre*</label><br>
        <input type="text" name="nombre" id="nombre" value="<?= $cliente['nombre'] ?>"><br>
          
        <label for="rif">Rif/Cedula</label><br>
        <input type="text" name="rif" id="rif" value="<?= $cliente['rif'] ?>"><br>
          
        <label for="direccion">Direcci&oacute;n</label><br>
        <textarea cols="50" rows="5" name="direccion" id="direccion"><?= $cliente['direccion'] ?></textarea><br>
          
        <label for="telefono">Telefono</label><br>
        <input type="text" name="telefono" id="telefono" value="<?= $cliente['telefono'] ?>"><br>
          
        <label for="celular">Celular</label><br>
        <input type="text" name="celular" id="celular" value="<?= $cliente['celular'] ?>"><br>
        <input type="hidden" value="<?= $cliente['id'] ?>" name="id">
        <input type="submit" value="Modificar">
        <a href="../">Cancelar</a>
    	<?php endforeach ?>
	</div>

</form>
