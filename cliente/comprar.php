<?php

session_start();

include '../lib/conexion.php';
include '../lib/seguridadcliente.php';

try{
	$sql = 'SELECT * FROM clientes WHERE correo = :correo';

	$s = $pdo->prepare($sql);
	$s->bindValue(':correo', $_SESSION['correo']);
	$s->execute();
}
catch(PDOException $e){
	echo "ha ocurrido un error";
	exit();
}

if ($row = $s->fetch()){
	$idcliente = $row['id'];
}

try{
	$sql = 'INSERT INTO compra SET
	idcliente = :idcliente,
	idarticulo = :idarticulo,
	foto = :foto,
	talla = :talla,
	oro = :oro,
	observacion = :observacion,
	estado = :estado';

	$s = $pdo->prepare($sql);
	$s->bindValue(':idcliente', $idcliente);
	$s->bindValue(':idarticulo', $_POST['id']);
	$s->bindValue(':foto', $_POST['foto']);
	$s->bindValue(':talla', $_POST['talla']);
	$s->bindValue(':oro', $_POST['oro']);
	$s->bindValue(':observacion', $_POST['observaciones']);
	$s->bindValue(':estado', 'Espera');
	$s->execute();
}

catch(PDOException $e){
	echo "ha ocurrido un error".$e;
	exit();
}

header( "refresh:5;url=../categorias.html.php" )
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Talentum Joyas | Inicio</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet" href="../css/960_12_col.css">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Kite+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/horizontal.css">
<!--  Load jQuery -->
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>

<script src="../js/jquery.cycle2.min.js" type="text/javascript"></script>
<script src="../js/jquery.cycle2.carousel.min.js" type="text/javascript"></script>

<script type="text/javascript" src="../js/vendor.js"></script>
<script type="text/javascript" src="../js/sly.min.js"></script>
<script type="text/javascript" src="../js/horizontal.js"></script>

<!--  JS del MODAL WIndows -->
<script type="text/javascript" src="../js/Modal.js"></script>  
  
</head>

<body>


  <header>
    <div class="BarraSuperior">

      <div class="container_12">

        <nav class="barraNav">
          <ul>
            <li>
              <a href="../">Inicio</a>
            </li>
            <li>
              <a href="../categorias.html.php">Productos</a>
            </li>
            <li>
              <a href="../contacto.php">Contacto</a>
            </li>
            <li>

              <a href="#">Cliente</a>
              <ul class="barraNavSubmenu">
              <?php if ($_SESSION['login'] != true){ ?>
                <li>
                  <a href="#login" name="modal">Ingresar</a>
                </li>
                <li>
                  <a href="#dialog" name="modal">Registrarse</a>
                </li>
              <?php }else{ ?>
                <li>
                  <a href="../cliente/pago.php">Pagar</a>
                </li>
                <li>
                  <a href="../cliente/estado.php">Estado Compras</a>
                </li>
                <li>
                  <a href="../cliente/modificar.php">Actualizar Datos</a>
                </li>
                <li>
                  <a href="../lib/salir.php">Cerrar Sesion</a>
                </li>
              <?php } ?>
              </ul>

            </li>
          </ul>
        </nav>

      </div>

    </div>
    <div class="container_12 barraPrincipal">
      <div class="grid_12">
        <div class="grid_4">
          <a href="../">

            <img src="../img/logo.png" alt="">
          </a>
        </div>

        <div class="grid_4 push_4">
          <div class="row oro">
            <div class="orito">
              <img src="../img/oro.png" alt="">
            </div>
            <div class="precioro">
              <p>Precio del Oro</p>
              <p>99999,99 $
                <img src="../img/FlechaArriba.png" alt="">
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
    <body>
     <div class="container_12 contenedorprincipal">		
     <div style="padding:20px;">		
<h2>Solicitud Realizada</h2><br>
<p>El navegador lo redireccionara automaticamente en 5 segundos</p>
<a href="../categorias.html.php">Volver al inicio</a>

     </div>
     </div>
  <footer>
    <div class="container_12 contfooter colordegradado2">
      <img src="../img/anillos.png" alt="" class="anillofooter">
      <div class="grid_3 txtfooter">
        <p>
          Talentum Joyas
        </p>
        <ul>
          <li>Email: talentumjoyas@hotmail.com</li>
          <li>Teléfono: +58416-6572119</li>
        </ul>
      </div>
      <div class="grid_2 txtfooter">
        <p>
          Sitemap
        </p>
        <ul>
          <li>
            <a href="../">Inicio</a>
          </li>
          <li>
            <a href="../categorias.html.php">Portafolio</a>
          </li>
          <li>
            <a href="../contacto.php">Contacto</a>
          </li>
          <li>
            <a href="../backend/menu.html.php">Admin</a>
          </li>
        </ul>
      </div>
      <div class="grid_3 txtfooter">
        <p>
          Redes Sociales
        </p>
        <ul class="listfootercontac listfootersocial">
          <li>
            <a href="#">
              <img src="../img/fb.png" alt=""> Facebook</a>
          </li>
          <li>
            <a href="http://www.twitter.com/talentumjoyas" target="_blank">
              <img src="../img/tw.png" alt=""> Twitter</a>
          </li>
          <li>
            <a href="#">
              <img src="../img/yt.png" alt=""> Google+</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  </body>

</html>







