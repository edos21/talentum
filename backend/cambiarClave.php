<?php
    session_start();
    include '../lib/seguridad.php';
    include '../includes/header.html';
?>

    <h2>Cambiar Clave</h2>
    <div class="push_10">
        <a class="BtnVolver" href="menu.html.php">Volver</a>
    </div>
	
	<div class="grid_11">
		<form method="post" action="claveCambiada.php">
			<label for="clave">Nueva clave:</label>
			<input type="password" name="clave" id="clave"><br>
            <label for="claveDos">Repertir clave</label>
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
