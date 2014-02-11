<?php

  session_start();
  error_reporting(0);
  include 'lib/conexion.php';

?>



<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Talentum Joyas | Inicio</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/960_12_col.css">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<!--<link href='http://fonts.googleapis.com/css?family=Kite+One' rel='stylesheet' type='text/css'>-->
<link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/horizontal.css">
<!--  Load jQuery -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

<script src="js/jquery.cycle2.min.js" type="text/javascript"></script>
<script src="js/jquery.cycle2.carousel.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/vendor.js"></script>
<script type="text/javascript" src="js/sly.min.js"></script>
<script type="text/javascript" src="js/horizontal.js"></script>

<!--  JS del MODAL WIndows -->
<script type="text/javascript" src="js/Modal.js"></script>  
  
</head>
<body>
<header>
    <div class="BarraSuperior">

      <div class="container_12">

        <nav class="barraNav">
          <ul>
            <li>
              <a href="./">Inicio</a>
            </li>
            <li>
              <a href="categorias.html.php">Productos</a>
            </li>
            <li>
              <a href="contacto.php">Contacto</a>
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
                  <a href="cliente/pago.php">Pagar</a>
                </li>
                <li>
                  <a href="cliente/estado.php">Estado Compras</a>
                </li>
                <li>
                  <a href="cliente/modificar.php">Actualizar Datos</a>
                </li>
                <li>
                  <a href="lib/salir.php">Cerrar Sesion</a>
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
          <a href="./">
          
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
  
  <div class="container_12 contenedorprincipal ContContact">
    
    <h2 class="TextCategoria">Contacto</h2>
    
    <div class="grid_3 Contacto">
      <ul>
        <li>
      
        <li><img src="img/phone32.png" alt="">
        <b>Teléfono:</b> +58 416-6572119</li>
        <li><img src="img/mailopened32.png" alt="">
        <b>Email</b> xxxxxxxxxxxx@gmail.com</li>
        <li></li>
                <div class="CodeQR"><img src="img/qrcod.png" alt=""></div>
      </ul>
    </div>
    <div class="grid_4">
      
    <form class="contact_form" action="#" method="post">
    <ul>
       <li>
           <label for="name">Nombre y Apellido:</label>
           <input type="text"  placeholder="Johan Ricardo" required />
       </li>
       <li>
           <label for="telf">Teléfono:</label>
           <input type="text" name="telf" placeholder="0123 1234567" required />
       </li>
       <li>
           <label for="email">Email:</label>
           <input type="email" name="email" placeholder="xxxxxxx@ejemplo.com" required />
       </li>
       <li>
           <label for="Mensaje">Mensaje:</label>
           <textarea name="Mensaje" cols="40" rows="6" required ></textarea>
       </li>
        <li>
          <button class="submit" type="submit">Enviar</button>
        </li>
    </ul>
</form>

      
    </div>
    <div class="grid_3 Social">
      <b>
        <span class="TextCategoria">Redes sociales</span>
      </b><br>
      <a href="#"><img src="img/Twitter.png" alt=""></a>
      <a href="#"><img src="img/Facebook.png" alt=""></a>
      <a href="#"><img src="img/YouTube.png" alt=""></a>
    </div>



  </div>
  <footer>
    <div class="container_12 contfooter colordegradado2">
      <img src="img/anillos.png" alt="" class="anillofooter">
      <div class="grid_3 txtfooter">
        <p>
          Talentum Joyas
        </p>
        <ul>
          <li>Dirección: Av. 20 con calle 28 y 29, Edificio Balmoral, Piso 1.</li>
          <li>Teléfono: +58416-6572119</li>
          <li>E-mail:</li>
        </ul>
      </div>
      <div class="grid_2 txtfooter">
        <p>
          Sitemap
        </p>
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Portafolio</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="backend/menu.html.php">Admin</a></li>
        </ul>
      </div>
      <div class="grid_3 txtfooter">
        <p>
          Redes Sociales
        </p>
            <ul class="listfootercontac listfootersocial">
              <li><a href="#"><img src="img/fb.png" alt=""> Facebook</a></li>
              <li><a href="#"><img src="img/tw.png" alt=""> Twitter</a></li>
              <li><a href="#"><img src="img/yt.png" alt=""> Google+</a></li>
            </ul>
      </div>
    </div>
  </footer>
<?php
	
	include ('/includes/ModalBox.html');

?>
</body>
</html>