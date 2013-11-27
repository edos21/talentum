<?php
session_start();

include 'lib/conexion.php';

try {

			$sql = 'SELECT * FROM clientes WHERE
			correo = :correo AND
			clave = :clave';

			$s = $pdo -> prepare($sql);
			$s->bindValue(':correo', $_POST['correo']);
			$s->bindValue(':clave', $_POST['clave']);
			$s->execute();

		}

		catch (PDOException $e) {

			echo 'Error iniciando sesion.';
			exit();

		}

		if ($s->rowCount() == 1) {

			$_SESSION['login'] = true;
			$_SESSION['correo'] = $_POST['correo'];
			header('Location: ./');
			exit();

		}

		else {
			if (isset($_POST['error'])){
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				header('Location: ' . $_SERVER['HTTP_REFERER']."?error");
			}
			
		}