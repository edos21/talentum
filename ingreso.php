<?php
  session_start();

  include 'lib/conexion.php';

?>



<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Talentum Joyas | Inicio</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="image/x-icon" href="img/icon.ico" rel="icon" />
<link type="image/x-icon" href="img/icon.ico" rel="shortcut icon" />
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/960_12_col.css">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/horizontal.css">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.cycle2.min.js" type="text/javascript"></script>
<script src="js/jquery.cycle2.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/vendor.js"></script>
<script type="text/javascript" src="js/sly.min.js"></script>
<script type="text/javascript" src="js/horizontal.js"></script>
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
		<?php include 'includes/precio.php'?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container_12 contenedorprincipal">
  <form action="ingresar.php" method="post">
					<?php
						if (isset($_GET['error'])) {
					?>
						<h2>Su correo y Contrase&ntilde;a no coinciden, por favor, verifique</h2>
						<input type="hidden" name="error">
					<?php
						}
					?>
					<?php
						if (isset($_GET['sesion'])) {
					?>
						<center>
							
						<h2>Por favor Inicie Sesion o Registrese</h2>
						</center>
					<?php
						}
					?>
<!--						<label for="correo">Correo</label>
						<input type="mail" name="correo" id="correo">
						<label for="clave">Contrase&ntilde;a</label>
						<input type="password" name="clave" id="clave">
						<input type="submit" value="Ingresar">-->
				<div class="ContLogin">
					<div style="padding:15px;">
						<center>
						<img src="img/business_user_add.png" alt=""> 
						<br>
						<br>

						<label for="usuario">Usuario</label>
						<br>
						<input type="text" name="usuario" id="usuario">
						<br>
						<label for="clave">Contrase&ntilde;a</label>
						<br>
						<input type="password" name="clave" id="clave">
						<br>

						<input type="submit" value="Ingresar" class="BtnLogin">
						<a class="BtnReg" href="registro.php">Registrarse</a>
						</center>
					</div>
				</div>
	</form>
	
  </div>
  <footer>
    <div class="container_12 contfooter colordegradado2">
      <img src="img/anillos.png" alt="" class="anillofooter">
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
            <a href="./">Inicio</a>
          </li>
          <li>
            <a href="categorias.html.php">Portafolio</a>
          </li>
          <li>
            <a href="contacto.php">Contacto</a>
          </li>
          <li>
            <a href="backend/menu.html.php">Admin</a>
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
              <img src="img/fb.png" alt=""> Facebook</a>
          </li>
          <li>
            <a href="http://www.twitter.com/talentumjoyas" target="_blank">
              <img src="img/tw.png" alt=""> Twitter</a>
          </li>
          <li>
            <a href="#">
              <img src="img/yt.png" alt=""> Google+</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  
<?php
	
	include ('/includes/ModalBox.html');

?>
  
</body>

</html>