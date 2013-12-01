<?php

session_start();

include 'lib/conexion.php';
include 'lib/seguridad.php';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Talemtum Joyas | Compra</title>
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
	if ($_POST['talla']=="" || $_POST['oro']==""){
		header( "refresh:5;url=".$_SERVER['HTTP_REFERER'] )
?>
	<p>Recuerde llenar la talla y el tipo de oro que desea adquirir</p>
	<a href="javascript: history.back()">Cancelar</a>
<?php
	}else{
?>
	<p>¿Seguro de Solicitar el articulo?</p>
	<img src="img/productos/<?=$_POST['foto']?>">
	<p>De talla <b><?=$_POST['talla']?></b> y Oro <b><?=$_POST['oro']?></b></p>
	<p>Observaciones: <?=$_POST['observaciones']?></p>
	<form action="comprar.php" method="post">
		<input type="hidden" name="id" value="<?=$_POST['iditem']?>">
		<input type="hidden" name="foto" value="<?=$_POST['foto']?>">
		<input type="hidden" name="talla" value="<?=$_POST['talla']?>">
		<input type="hidden" name="oro" value="<?=$_POST['oro']?>">
		<input type="hidden" name="observaciones" value="<?=$_POST['observaciones']?>">
		<input type="submit" value="Aceptar">
		<a href="javascript: history.back()">Cancelar</a>
	</form>
	<p>Al momento de confirmar su pedido, le enviaremos un correo a <b><?=$_SESSION['correo']?></b></p>
	<?php } ?>
</body>
</html>