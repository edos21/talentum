<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Talemtum Joyas | Registro</title>
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
	<form action="registrar.php" method="POST">
	<?php
		if (isset($_GET['error'])) {
	?>
		<h2>Error, Favor verifique que todos los datos estan correctamente llenados o que ya no se encuentra registrado</h2>
		<input type="hidden" name="error">
	<?php
		}
	?>
		<label for="correo">Correo*</label>
		<input type="mail" name="correo" id="correo" placeholder="ejemplo@dominio.com">
		<label for="clave">Contrase&ntilde;a*</label>
		<input type="password" name="clave" id="clave">
		<span>La clave debe tener mas de 8 caracteres</span>
		<label for="cclave">Repetir Contrase&ntilde;a*</label>
		<input type="password" name="cclave" id="cclave">
		<label for="rif">Rif/Cedula</label>
		<input type="text" name="rif" id="rif">
		<label for="nombre">Razon Social/Nombre*</label>
		<input type="text" name="nombre" id="nombre">
		<label for="direccion">Direcci&oacute;n</label>
		<textarea name="direccion" id="direccion"></textarea>
		<label for="telefono">Telefono</label>
		<input type="text" name="telefono" id="telefono">
		<label for="celular">Celular</label>
		<input type="text" name="celular" id="celular">
		<input type="submit" value="Registrar">
	</form>
</body>
</html>