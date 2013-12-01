<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Talemtum Joyas | Inicio</title>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/960_12_col.css">

  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>

</head>
<body>
	<div class="fondoNegro colordegradado"></div>
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
  
  <div class="container_12 contenedorprincipal">
	<form class="FormRegistro" action="registrar.php" method="POST">
	<?php
		if (isset($_GET['error'])) {
	?>
		<h2>Error, Favor verifique que todos los datos estan correctamente llenados o que ya no se encuentra registrado</h2>
		<input type="hidden" name="error">
	<?php
		}
	?>
		
		<div class="grid_4">
		  <img src="img/business_user_add.png" alt="">
		  
		</div>
		
		<div class="grid_8">
		  
          <label for="nombre">Razon Social/Nombre*</label><br>
          <input type="text" name="nombre" id="nombre"><br>
          
          <label for="rif">Rif/Cedula</label><br>
          <input type="text" name="rif" id="rif"><br>
                    
          <label for="clave">Contrase&ntilde;a*</label><br>
          <input type="password" name="clave" id="clave"><br>
    
                  <span>La clave debe tener mas de 8 caracteres</span><br>
          
          <label for="cclave">Repetir Contrase&ntilde;a*</label><br>
          <input type="password" name="cclave" id="cclave"><br>
          
          <label for="correo">Correo*</label><br>
          <input type="mail" name="correo" id="correo" placeholder="ejemplo@dominio.com"><br>
          
          <label for="direccion">Direcci&oacute;n</label><br>
          <textarea cols="50" rows="5" name="direccion" id="direccion"></textarea><br>
          
          <label for="telefono">Telefono</label><br>
          <input type="text" name="telefono" id="telefono"><br>
          
          <label for="celular">Celular</label><br>
          <input type="text" name="celular" id="celular"><br>
          <input type="submit" value="Registrar">
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
</body>
</html>