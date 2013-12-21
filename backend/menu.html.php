<!Doctype html>
<html>
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
  <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
  <script src="../js/jquery.cycle2.min.js" type="text/javascript"></script>
  <script src="../js/jquery.cycle2.carousel.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="../js/vendor.js"></script>
  <script type="text/javascript" src="../js/sly.min.js"></script>
  <script type="text/javascript" src="../js/horizontal.js"></script>
  <link rel="stylesheet" href="../css/menu-css3.css">
	</head>
	<body>
    <div class="fondoNegro colordegradado"></div>
<header>
   <div class="BarraSuperior">

      <div class="container_12">

        <nav class="barraNav">
          <ul>
            <li>
              <a href="#">Inicio</a>
            </li>
            <li>
              <a href="../categorias.html.php">Productos</a>
            </li>
            <li>
              <a href="../contacto.html">Contacto</a>
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
          <a href="#">

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
 
		<div class="container_12 contenedorprincipal">
			<div class= "grid_2">
				<br>
				<h2>Menu Principal</h2>
			</div>
			<div class="clearfix"></div>
			<div class= "grid_2">
			<img src="../img/iconadmin/logoadmin.png">
			</div>
	
			<br>
			<ul class="menu">
					<li><a href="#">Articulos</a>
						<ul class="submenu">
							<!--li*5>a[href=#]{sub enlace $}-->
							<li><a href="agregarArticulo.php"><img src="../img/iconadmin/add.png"> Agregar</a></li>
							<li><a href="modificarArticulo.php"><img src="../img/iconadmin/edit.png"> Modificar/Eliminar</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Categorias</a>
						<ul class="submenu">
							<!--li*5>a[href=#]{sub enlace $}-->
							<li><a href="agregarCategoria.php"><img src="../img/iconadmin/add.png"> Agregar</a></li>
							<li><a href="modificarCategoria.php"><img src="../img/iconadmin/edit.png"> Modificar/Eliminar</a></li>
						</ul>
					</li>
					<li><a href="#">SubCategorias</a>
						<ul class="submenu">
							<!--li*5>a[href=#]{sub enlace $}-->
						<li><a href="agregarSubCategoria.php"><img src="../img/iconadmin/add.png"> Agregar</a></li>
						<li><a href="modificarSubCategoria.php"><img src="../img/iconadmin/edit.png"> Modificar/Eliminar</a></li>
						</ul>
					</li>
					<li><a href="#">Herramientas</a>
						<ul class="submenu">
							<!--li*5>a[href=#]{sub enlace $}-->
              <li><a href="agregarPrecios.php"><img src="../img/iconadmin/add.png"> Ingresar Precios</a></li> 
                <li><a href="modificarPrecios.php"><img src="../img/iconadmin/edit.png"> Ajustar Precios</a></li>            
							<li><a href="cambiarClave.php"><img src="../img/iconadmin/pass.png"> Cambiar contraseña</a></li>
						</ul>
					</li>
					<li><a href="#">Clientes</a>
						<ul class="submenu">
						<!--li*5>a[href=#]{sub enlace $}-->
						<li><a href="movimientoEspera.php"><img src="../img/iconadmin/add.png"> Movimientos en Espera</a></li>
						<li><a href="modificarMovimientos.php"><img src="../img/iconadmin/edit.png"> Modificar Movimientos</a></li>
						<li><a href="registraPago.php"><img src="../img/iconadmin/money.png"> Registrar Pago</a></li>
            <li><a href="recuperaClave.php"><img src="../img/iconadmin/pass.png"> Recuperar Claves</a></li>
						</ul>
					</li>
			</ul>
			<br>

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
            <a href="#">Inicio</a>
          </li>
          <li>
            <a href="#">Portafolio</a>
          </li>
          <li>
            <a href="#">Contacto</a>
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