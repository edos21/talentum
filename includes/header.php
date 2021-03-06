<!doctype html>
<html lang="en">
  
  <head>
  <meta charset="UTF-8">
  <title>Talentum Joyas | Inicio</title>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/960_12_col.css">
  <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />

<link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,200' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="../css/menu-css3.css">
  <link rel="stylesheet" href="../css/styleAdmin.css">
    <!--  JS del MODAL WIndows -->
<script type="text/javascript" src="../js/Modal.js"></script>  
    <script type="text/javascript">
    function recargarSub(val){
 
         $('#subcategoria').html('<option value="">Cargando...</option>');

         $.ajax({
          url: 'cargarSub.php',
          data: 'id='+val,
          success: function(resp){
           $('#subcategoria').html(resp)
           }
        });
      }
    function recargarPre(val){
    
           $('#precio').val('Calculando...');
           oro = $('#oro').val();
           $.ajax({
            url: 'cargarPre.php',
            data: 'id='+val+'&oro='+oro,
            success: function(resp){
             $('#precio').val(resp)
             }
          });
        }  
    </script>
  </head>
    <body>

<header>
    <div class="BarraSuperior">
    
      <div class="container_12">
      
        <nav class="barraNav">
          <ul>
            <li><a href="../">Inicio</a></li>
            <li><a href="../categorias.html.php">Productos</a></li>
            <li><a href="../contacto.php">Contacto</a></li>
<!--            <li>
              
              <a href="#">Cliente</a>
              <ul class="barraNavSubmenu">
                <li><a href="#">Ingresar</a></li>
                <li><a href="#">Registrarse</a></li>
              </ul>
              
            </li>-->
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
		<?php include 'includes/precio.php'?>
          </div>
          </div>
        </div> 
      </div>
    </div>
  </header>
    <body>
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
              <li><a href="precioMaterial.php"><img src="../img/iconadmin/edit.png"> Precios Materiales</a></li>
              <li><a href="cambiarClave.php"><img src="../img/iconadmin/pass.png"> Cambiar contraseña</a></li>
              <li><a href="../lib/salir.php"><img src="../img/iconadmin/pass.png"> Cerrar Sesion</a></li>
            </ul>
          </li>
          <li><a href="#">Clientes</a>
            <ul class="submenu">
            <!--li*5>a[href=#]{sub enlace $}-->
            <li><a href="movimientoEspera.php"><img src="../img/iconadmin/add.png"> Movimientos en Espera</a></li>
            <li><a href="modificarMovimientos.php"><img src="../img/iconadmin/edit.png"> Modificar Movimientos</a></li>
            <li><a href="agregarPago.php"><img src="../img/iconadmin/money.png"> Registrar Pago</a></li>
            <li><a href="recuperaClave.php"><img src="../img/iconadmin/pass.png"> Recuperar Claves</a></li>
            </ul>
          </li>
      </ul>
      <br>
      <div id="content">
