<?php
    session_start();
	include '../lib/conexion.php';
	include '../lib/seguridad.php';
	include '../includes/header.php';
	
	if($_POST['clave'] == $_POST['claveDos'] && $_POST['clave'] != ""){
	    try{
	        $sql = 'UPDATE usuarios SET
	                clave = :clave';
	        
	        $s = $pdo->prepare($sql);
	        $s->bindValue(':clave', $_POST['clave']);
	        $s->execute();
	    } catch (PDOException $e){
	        echo 'error al modificar';
	        exit();
	    }
	    ?>
	    <center>
		<h2>Clave Modificada</h2><br>
		<a  class="BtnVolver" href="menu.html.php">Volver</a>
		</center>
		<br>
		<br>
		<?php
	} else{
	?>
	    <h2>Favor ingrese los datos correctos</h2><br>
		<a href="javascript:history.back()">Volver</a>
	<?php
	}
	include '../includes/footer.html';
