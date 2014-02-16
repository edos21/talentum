<?php

session_start();

include '../lib/conexion.php';
include '../lib/seguridadcliente.php';

//buscar el id en funcion de su correo
try{

	$sql= 'SELECT * FROM clientes WHERE
	correo=:correo';

	$s = $pdo->prepare($sql);
	$s->bindValue(':correo',$_SESSION['correo']);
	$s->execute();
}

catch(PDOException $e){
	echo "Error al cargar clientes";
	exit();
}

while($row = $s->fetch()){
	$clientes[] = array(
		'id' => $row['id'],
		'rif' => $row['rif'],
		'nombre' => $row['nombre'],
		'direccion' => $row['direccion'],
		'telefono' => $row['telefono'],
		'celular' => $row['celular']
	);
}

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
<link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,200' rel='stylesheet' type='text/css'>
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
    <div class="container_12 barraPrincipal" >
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
		<?php include '../includes/precio.php'?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
    <body>
<div class="container_12 contenedorprincipal">
	<h2 class="TextCategoria">Modificar perfil</h2>
	<div class="grid_2">
		<img src="../img/profile.gif" alt="">
	</div>
	<div class="grid_8" >
		<form action="modifica.php" method="POST">
			<?php if (isset($_GET[ 'error'])) { ?>

			<h2>Error, Favor verifique que todos los datos estan correctamente llenados o que no se encuentra registrado</h2>
			<input type="hidden" name="error">

			<?php } if (isset($_GET[ 'guardado'])) { ?>

			<h2>Datos Modificados Correctamente</h2>
			<input type="hidden" name="guardado">
			<?php } foreach($clientes as $cliente): ?>

			<label for="nombre">Razon Social/Nombre*</label>
			<br>
			<input type="text" name="nombre" id="nombre" value="<?php echo $cliente['nombre'] ?>">
			<br>

			<label for="rif">Rif/Cedula</label>
			<br>
			<input type="text" name="rif" id="rif" value="<?php echo $cliente['rif'] ?>">
			<br>

			<label for="direccion">Direcci&oacute;n</label>
			<br>
			<textarea cols="50" rows="5" name="direccion" id="direccion">
				<?php echo $cliente[ 'direccion'] ?>
			</textarea>
			<br>

			<label for="telefono">Telefono</label>
			<br>
			<input type="text" name="telefono" id="telefono" value="<?php echo $cliente['telefono'] ?>">
			<br>

			<label for="celular">Celular</label>
			<br>
			<input type="text" name="celular" id="celular" value="<?php echo $cliente['celular'] ?>">
			<br>
			<input type="hidden" value="<?php echo $cliente['id'] ?>" name="id">
			<input type="submit" value="Modificar" class="BtnGuardar">
			<a href="../" class="BtnVolver">Cancelar</a>
			<?php endforeach ?>
		</form>
	</div>
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







