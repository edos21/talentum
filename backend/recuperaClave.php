<?php
    session_start();
    include '../lib/seguridad.php';
    include '../lib/conexion.php';
    include '../includes/header.php';
    
    try{
        $sql = 'SELECT * FROM clientes';
        
        $s = $pdo->prepare($sql);
        $s->execute();
    } catch(PDOException $e){
        echo 'error al seleccionar la tabla';
        exit();
    }
    while($row = $s->fetch()){
		$clientes[] = array(
			'correo'=>$row['correo']);
	}
?>

    <h2>Cambiar Clave de Clientes</h2>
    <div class="push_10">
        <a class="BtnVolver" href="menu.html.php">Volver</a>
    </div>
	
	<div class="grid_11">
		<form method="post" action="actualizarClave.php">
		    <label for="correo">Correo del cliente:</label>
			<input type="mail" name="correo" id="correo" list="clientes" autocomplete="off"><br>
			<datalist id="clientes">
			    <?php foreach($clientes as $cliente): ?>
				<option value="<?php echo $cliente['correo'] ?>">
				<?php endforeach; ?>
			</datalist>
			<label for="clave">Nueva Clave:</label>
			<input type="password" name="clave" id="clave"><br>
            <label for="claveDos">Repetir clave</label>
			<input type="password" name="claveDos" id="claveDos"><br>
            <div class="Botonera" >
                <input class="BtnGuardar" type="submit" value="Guardar">
            </div>
	</form>
	
	</div>
	<div class="clearfix"></div>
		
<?php

	include '../includes/footer.html';

?>
