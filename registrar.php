<?php

	include 'lib/conexion.php';

	$correo = $_POST['correo'];
	$clave = $_POST['clave'];
	$cclave = $_POST['cclave'];
	$nombre = $_POST['nombre'];

	if ($correo == "" || $clave == "" || $cclave == "" || $nombre == "") 
	{
		if (isset($_POST['error'])){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			header('Location: ' . $_SERVER['HTTP_REFERER']."?error");
		}

	}elseif($clave === $cclave){
		try{
			$sql = 'SELECT * FROM clientes WHERE correo = :correo';
			$s = $pdo->prepare($sql);
			$s->bindValue(':correo',$correo);
			$s->execute();
		}

		catch(PDOException $e){

			echo "Ha ocurrido un error";
			exit();

		}
		if ($s->rowCount() != 0) {
			if (isset($_POST['error'])){
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
					header('Location: ' . $_SERVER['HTTP_REFERER']."?error");
			}
		}else{
			try{

				$sql = 'INSERT INTO clientes SET
				correo = :correo,
				clave = :clave,
				rif = :rif,
				nombre = :nombre,
				direccion = :direccion,
				telefono = :telefono,
				celular = :celular';

				$s = $pdo->prepare($sql);
				$s->bindValue(':correo',$correo);
				$s->bindValue(':clave',$clave);
				$s->bindValue(':rif',$_POST['rif']);
				$s->bindValue(':nombre',$nombre);
				$s->bindValue(':direccion',$_POST['direccion']);
				$s->bindValue(':telefono',$_POST['telefono']);
				$s->bindValue(':celular',$_POST['celular']);
				$s->execute();

				header( "refresh:5;url=index.php" )
			?>
		<?php include 'includes/header.php'?>				
				<h2>Registro Satisfactorio</h2><br>
				<p>El navegador lo redireccionara automaticamente en 5 segundos</p>
				<a href="./">Volver al inicio</a>
		<?php include 'includes/footer.php'?>
			<?php
			}

			catch(PDOException $e){

				echo "Ha ocurrido un error";
				exit();

			}
		}
		
	}else{
		if (isset($_POST['error'])){
				header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
				header('Location: ' . $_SERVER['HTTP_REFERER']."?error");
		}
	}

?>