<?php

session_start();

include 'lib/conexion.php';
include 'lib/seguridad.php';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Talemtum Joyas | Pagos</title>
</head>
<body>
<header>
    <div class="BarraSuperior">
    
      <div class="container_12">
      
        <nav class="barraNav">
          <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="categorias.html.php">Productos</a></li>
            <li><a href="contacto.html">Contacto</a></li>
            <li>
              
              <a href="contacto.html">Cliente</a>
              <ul class="barraNavSubmenu">
                <li><a href="#">Ingresar</a></li>
                <li><a href="#">Registrarse</a></li>
              </ul>
              
            </li>
          </ul>
        </nav>
        
      </div>
      
    </div>
    <div class="container_12 barraPrincipal">
      <div class="grid_12">
        <div class="grid_4">
          <a href="#">
          
          <img src="img/logo.png" alt="">
          </a>
        </div>
        
        <div class="grid_4 push_4">
          <div class="row oro">
            <div class="orito">
              <img src="img/oro.png" alt="">
            </div>
          <div class="precioro">
            <p>Precio del Oro</p>
            <p>99999,99 $
            <img src="img/FlechaArriba.png" alt="">
            </p>
          </div>
          </div>
        </div> 
      </div>
    </div>
  </header>
	<?php
		if ($_POST['tipo']=="" || $_POST['ndocumento']=="" || $_POST['monto']==""){
			if (isset($_POST['error'])){
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				header('Location: ' . $_SERVER['HTTP_REFERER']."?error");
			}
		}else{
	?>
	<p>¿Seguro de realizar el siguiente pago?</p>
	<p><b><?=$_POST['tipo']?></b> Nro: <b><?=$_POST['ndocumento']?></b>, por un monto de <b><?=$_POST['monto']?></b></p>
	<p>Observaciones: <?=$_POST['observaciones']?></p>
	<form action="realizarpago.php" method="post">
		<input type="hidden" name="tipo" value="<?=$_POST['tipo']?>">
		<input type="hidden" name="ndocumento" value="<?=$_POST['ndocumento']?>">
		<input type="hidden" name="monto" value="<?=$_POST['monto']?>">
		<input type="hidden" name="observaciones" value="<?=$_POST['observaciones']?>">
		<input type="submit" value="Aceptar">
		<a href="javascript: history.back()">Cancelar</a>
	</form>
	<p>Al momento de confirmar su pago, le enviaremos un correo a <b><?=$_SESSION['correo']?></b></p>
	<?php } ?>
</body>
</html>