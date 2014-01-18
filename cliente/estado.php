<?php
error_reporting(0);
session_start();

include '../lib/conexion.php';
include '../lib/seguridadcliente.php';
$compraTotal = 0;
$pagoTotal = 0;
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

if($row = $s->fetch()){
	$idcliente = $row['id'];
}

// Cargar articulos en espera
try{

	$sql = 'SELECT * FROM compra WHERE
	idcliente=:idcliente';

	$s = $pdo->prepare($sql);
	$s->bindValue(':idcliente',$idcliente);
	$s->execute();
}

catch(PDOException $e){
	echo "Error al cargar compras".$e;
	exit();
}
while ($row = $s->fetch()) {
	$compras[] = array(
		'foto' => $row['foto'],
		'talla' => $row['talla'],
		'oro' => $row['oro'],
		'observacion' => $row['observacion'],
		'precio' => $row['precio'],
		'estado' => $row['estado']);
}

//cargar pagos en espera
try{

	$sql = 'SELECT * FROM pagos WHERE
	idcliente=:idcliente';

	$s = $pdo->prepare($sql);
	$s->bindValue(':idcliente',$idcliente);
	$s->execute();
}

catch(PDOException $e){
	echo "Error al cargar compras".$e;
	exit();
}
while ($row = $s->fetch()) {
	$pagos[] = array(
		'tipo' => $row['tipo'],
		'ndocumento' => $row['ndocumento'],
		'monto' => $row['monto'],
		'observacion' => $row['observacion'],
		'estado' => $row['estado']);
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
     <div class="container_12 contenedorprincipal" >
     <div style="padding:20px;">
<p>Articulos en espera</p>
<table border="1">
	<tr>
		<th>Articulo</th>
		<th>Talla</th>
		<th>Oro</th>
		<th>Observacion</th>
	</tr>
	<?php foreach ($compras as $compra): 
			if ($compra['estado'] == 'Espera'){	?>
	<tr>
		<td><img style="width:70px" src="../img/productos/<?= $compra['foto'] ?>"></td>
		<td><?= $compra['talla'] ?></td>
		<td><?= $compra['oro'] ?></td>
		<td><?= $compra['observacion'] ?></td>
	</tr>
	<?php }
	endforeach ?>
</table>

<p>Pagos en espera</p>
<table border="1">
	<tr>
		<th>Tipo</th>
		<th>Nro Documento</th>
		<th>Monto</th>
		<th>Observacion</th>
	</tr>
	<?php foreach ($pagos as $pago):
			if ($pago['estado'] == 'Espera'){	?>
	<tr>
		<td><?= $pago['tipo'] ?></td>
		<td><?= $pago['ndocumento'] ?></td>
		<td><?= $pago['monto'] ?></td>
		<td><?= $pago['observacion'] ?></td>
	</tr>
	<?php }
	 endforeach ?>
</table>

<p>Articulos Aprobados y Comprados</p>
<table border="1">
	<tr>
		<th>Articulo</th>
		<th>Talla</th>
		<th>Oro</th>
		<th>Observacion</th>
		<th>Precio</th>
	</tr>
	<?php foreach ($compras as $compra): 
			if ($compra['estado'] != 'Espera'){
			$compraTotal += $compra['precio']	?>
	<tr>
		<td><img style="width:70px" src="../img/productos/<?= $compra['foto'] ?>"></td>
		<td><?= $compra['talla'] ?></td>
		<td><?= $compra['oro'] ?></td>
		<td><?= $compra['observacion'] ?></td>
		<td><?= $compra['precio'] ?></td>
	</tr>
	<?php }
	endforeach ?>
</table>
<p>Total de compras <b><?= $compraTotal ?></b></p>

<p>Pagos Aprobados</p>
<table border="1">
	<tr>
		<th>Tipo</th>
		<th>Nro Documento</th>
		<th>Monto</th>
		<th>Observacion</th>
	</tr>
	<?php foreach ($pagos as $pago):
			if ($pago['estado'] != 'Espera'){
			$pagoTotal += $pago['monto']		?>
	<tr>
		<td><?= $pago['tipo'] ?></td>
		<td><?= $pago['ndocumento'] ?></td>
		<td><?= $pago['monto'] ?></td>
		<td><?= $pago['observacion'] ?></td>
	</tr>
	<?php }
	 endforeach ?>
</table>
<p>Total de pagos <b><?= $pagoTotal ?></b></p>

<p>Balance de Compras <b><?= $compraTotal - $pagoTotal ?></b></p>


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







