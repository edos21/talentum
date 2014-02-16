<?php
  session_start();
	include '../lib/conexion.php';
	include '../lib/seguridad.php';
	include '../includes/header.html';
	
	if($_POST['clave'] == $_POST['claveDos'] && $_POST['clave'] != "" && $_POST['correo']){
	    try{
	        $sql = 'UPDATE clientes SET
	                clave = :clave WHERE
	                correo = :correo';
	        
	        $s = $pdo->prepare($sql);
	        $s->bindValue(':clave', $_POST['clave']);
	        $s->bindValue(':correo', $_POST['correo']);
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
