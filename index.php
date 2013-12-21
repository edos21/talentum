<?php
  session_start();
  error_reporting(0);
  include 'lib/conexion.php';

  try{

    $sql = 'SELECT * FROM categoria';

    $s = $pdo->prepare($sql);
    $s->execute();

    while($row = $s->fetch()){
      $categorias[]= array(
        'id'=>$row['id'],
        'nombre'=>$row['nombre'],
        'img'=>$row['img']);
    }
  }
  catch(PDOException $e){
    echo "error al cargar las categorias".$e;
    exit();
  }
?>

<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Talentum Joyas | Inicio</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/960_12_col.css">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Kite+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/horizontal.css">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.cycle2.min.js" type="text/javascript"></script>
<script src="js/jquery.cycle2.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/vendor.js"></script>
<script type="text/javascript" src="js/sly.min.js"></script>
<script type="text/javascript" src="js/horizontal.js"></script>
  

<!--  JS del MODAL WIndows -->
 <script type="text/javascript">
     $(document).ready(function() {
     $('a[name=modal]').click(function(e) {
     e.preventDefault();
     var id = $(this).attr('href');
     /*var maskHeight = $(document).height();*/
     var maskHeight = $(document).height();
     var maskWidth = $(document).width();     
/*     var maskHeight = $(window).height();
     var maskWidth = $(window).width();*/
     $('#mask').css({'width':maskWidth,'height':maskHeight});
     $('#mask').fadeIn(1000);
     $('#mask').fadeTo("slow",0.8);
     var winH = $(window).height();
     var winW = $(window).width();
     $(id).css('top', winH/2-$(id).height()/2);
     $(id).css('left', winW/2-$(id).width()/2);
     $(id).fadeIn(2000);
     });
     $('.window .close').click(function (e) {
     e.preventDefault();
     $('#mask, .window').hide();
     });
     $('#mask').click(function () {
     $(this).hide();
     $('.window').hide();
     });
     });
     
     
     
     
     $(document).ready(function () {
     $(window).resize(function () {
        var box = $('#modalBoxes .window');
        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
      
        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});
               
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();
        //Set the popup window to center
        box.css('top',  winH/2 - box.height()/2);
        box.css('left', winW/2 - box.width()/2);
});
});
 </script>  
  
</head>

<body>


  <header>
    <div class="BarraSuperior">

      <div class="container_12">

        <nav class="barraNav">
          <ul>
            <li>
              <a href="#">Inicio</a>
            </li>
            <li>
              <a href="categorias.html.php">Productos</a>
            </li>
            <li>
              <a href="contacto.html">Contacto</a>
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


  <div class="slider">
    <div class="sliderBarra">
      <p>
        <img src="img/Search.png" alt=""><input type="search">
      </p>
    </div>
    <div class="TituloSlider">
      <p><span>Talentum Joyas</span><br>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, ipsum harum sed sint reprehenderit nemo enim repellendus quas veritatis quia!</p>
    </div>
    <div class="cycle-slideshow" data-cycle-next="#next3" data-cycle-prev="#prev3" data-cycle-tile-vertical=false data-cycle-speed="1000">
      
      <img src="img/slider/1.jpg">
      <img src="img/slider/2.jpg">
      <img src="img/slider/3.jpg">
      <img src="img/slider/4.jpg">


    </div>
  </div>


  <div class="container_12 contenedorprincipal ContDegradado">
    <div class="sliderpequeno ">
<div class="pagespan ">
  <div class="wrap">



    <div class="frame" id="basic" style="overflow: hidden;">
      <ul style="-webkit-transform: translateZ(0px) translateX(-228px); width: 6840px;">
        <li>
          <img src="img/a1.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a2.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a3.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a4.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a5.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a5.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a5.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a5.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a5.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
      </ul>
    </div>
    <div class="scrollbar">
      <div class="handle" style="-webkit-transform: translateZ(0px) translateX(38px); width: 190px;">
        <div class="mousearea"></div>
      </div>
    </div>
  </div>
</div>
    </div>




    <div class="grid_4 cuadro360">
      <div class="Barra360">
        <p>Lorem ipsum dull!</p>
      </div>
      <img src="img/360.png" alt="" class="png360">
      <iframe src="Anillo3D/ANILLO%201.html" width="300" height="395" frameborder="0"></iframe>

      <img src="img/sombra1.png" alt="" class="sombra">
    </div>

    <div class="grid_4 cuadro360">
      <div class="Barra360">
        <p>Lorem ipsum dull!</p>
      </div>
      <img src="img/360.png" alt="" class="png360">
      <iframe src="Anillo3D/ANILLO%20124.html" width="300px" height="395px" frameborder="0"></iframe>

      <img src="img/sombra1.png" alt="" class="sombra">
    </div>

    <div class="grid_4 cuadro360">
      <div class="Barra360">
        <p>Lorem ipsum dull!</p>
      </div>
      <img src="img/360.png" alt="" class="png360">
      <iframe src="Anillo3D/ANILLO%202.html" width="300px" height="395px" frameborder="0"></iframe>

      <img src="img/sombra1.png" alt="" class="sombra">
    </div>

    <div class="grid_7">
      <video src="video/video.webm" width="540" height="304" controls>
  
        Your browser does not support the video tag.
      </video>
      <!--      <iframe width="540" height="304" src="//www.youtube.com/embed/NJuujXUp-UQ" frameborder="0" allowfullscreen></iframe>-->
    </div>
    <div class="grid_5">
            <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/InvertirOro" data-widget-id="402202542399950848">Tweets por @InvertirOro</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    </div> <div class="clearfix"></div>

      <div class="grid_4 CuadroText">
        <p>Visión</p>
        <p class="CuadroTextPadding">Hacer de nuestra empresa un líder nacional y regional en procesos de producción  joyería, y tener como prioridad  incluir a personas con discapacidad y darles  capacitación  para incorporarlos a nuestra compañía...
          <br>
          <a class="btnVermas" href="#empresa" name="modal">+ ver más.</a>
        </p>
        <br>
      
      </div>
      <div class="grid_4 CuadroText">
        <p>Misión</p>
        <p class="CuadroTextPadding">Proporcionar  a nuestros clientes productos con costo razonable y de alta calidad, con diseños innovadores de diferente materiales ya sea aleaciones de metales, metales preciosos, piedras semipreciosas, como también piedras preciosas...
          <br>
          <a class="btnVermas" href="#empresa" name="modal">+ ver más.</a>
        </p>
        <br>
      
      </div>
      <div class="grid_4 CuadroText">
        <p>Empresa</p>
        <p class="CuadroTextPadding">Iniciamos nuestras actividades hace dos años y en el 2013 creamos la compañía  con tecnologías de control numérico  por computadora (CNC), es un sistema que permite controlar en todo momento la posición de un elemento físico, normalmente una herramienta que está montada en una máquina...
          <br>
          <a class="btnVermas" href="#empresa" name="modal">+ ver más.</a>
        </p>
        <br>
      
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
  
<div id="modalBoxes">
  <div id="mask"></div>
  <div id="dialog" class="window">

    <form class="FormRegistro" action="registrar.php" method="POST">
    <a href="#" class="close">
      <img src="img/exit.png" alt="">
    </a>

      <?php if (isset($_GET[ 'error'])) { ?>
      <h4>Error, Favor verifique que todos los datos estan correctamente llenados o que ya no se encuentra registrado</h4>
      <input type="hidden" name="error">
      <?php } ?>

      <div class="grid_2 ModalLogo">
        <img src="img/business_user_add.png" alt="" style="padding: 0 10px;" >
        <span class="TextCategoria">Registro</span>
      </div>

      <div class="grid_4">
        <label for="nombre">Razon Social/Nombre*</label>
        <br>
        <input type="text" name="nombre" id="nombre">
        <br>

        <label for="rif">Rif/Cedula</label>
        <br>
        <input type="text" name="rif" id="rif">
        <br>
      </div>

      <div class="grid_6">

        <label for="correo">Correo*</label>
        <br>
        <input type="mail" name="correo" id="correo" placeholder="ejemplo@dominio.com">
        <br>
        <label for="celular">Celular</label>
        <br>
        <input type="text" name="celular" id="celular">
        <br>

      </div>
      <div class="grid_4">

        <label for="clave">Contrase&ntilde;a*</label>
        <br>
        <input type="password" name="clave" id="clave">
        <br>


        <label for="cclave">Repetir Contrase&ntilde;a*</label>
        <br>
        <input type="password" name="cclave" id="cclave">
        <br>
        <p style="font-size:10px;color:red; position:absolute;">La clave debe tener mas de 8 caracteres</p>

      </div>
      <div class="grid_6">



        <label for="direccion">Direcci&oacute;n</label>
        <br>
        <textarea cols="50" rows="3" name="direccion" id="direccion"></textarea>
        <br>

        <label for="telefono">Telefono</label>
        <br>
        <input type="text" name="telefono" id="telefono">
        <br>


      </div>

      <div class="clearfix"></div>
      <input style="float:right;" class="FloatRight BtnVerde" type="submit" value="Registrar">

    </form>
  </div>
  <div id="login" class="window">
      <div class="FormRegistro">
      <div class="grid_2 ModalLogo">
        <img src="img/business_user_add.png" alt="" style="padding: 0 10px;" >
        <span class="TextCategoria">Inicio de Sesión</span>
      </div>
          <a href="#" class="FloatRight close">
            <img src="img/exit.png" alt="">
          </a>
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
          <h2>Por favor Inicie Sesion o Registrese</h2>
      <?php
          }
      ?>
          <label style="padding:0 0 0 42px;" for="correo">Correo</label>
          <input type="mail" name="correo" id="correo"><br>
          <label style="padding:0 0 0 20px;" for="clave">Contrase&ntilde;a</label>
          <input type="password" name="clave" id="clave"><br>
          <input style="float:right;" type="submit" value="Ingresar">
      </form><br>
      <a style="padding:0 0 0 20px;" href="#dialog" name="modal">Registrarse</a>
      </div>

</div>
  <div id="empresa" class="window">
    <center>
      <img style="padding:10px;" src="img/logo.png" alt="">
    </center>
    <br>
    <p style="padding:5px 20px;"><span style="font-weight:900;">Visión</span><br>
    Hacer de nuestra empresa un líder nacional y regional en procesos de producción  joyería, llevar nuestros productos a mercados internacionales, y tener como prioridad  incluir a personas con discapacidad y darles  capacitación  para incorporarlos a nuestra compañía, queremos ser ejemplo de progreso  e inclusión  de este colectivo en nuestro estado y en nuestro país. </p><br>
    <p style="padding:5px 20px;"><span style="font-weight:900;">Misión</span><br>
   Proporcionar  a nuestros clientes productos con costo razonable y de alta calidad, con diseños innovadores de diferente materiales ya sea aleaciones de metales, metales preciosos, piedras semipreciosas, como también piedras preciosas, que incentiven a la compra y conserven  costos bajos para  proporcionar diferentes alternativas a la hora de su compra. Por otra parte implementamos  herramientas visuales para dar a  conocer los productos antes de su fabricación, utilizando programas de tercera dimensión (3d) y herramientas de alta tecnología para que el cliente tenga mejores posibilidades de obtener la satisfacción del producto deseado.</p><br>
    <p style="padding:5px 20px;"><span style="font-weight:900;">Empresa</span><br>
    Iniciamos nuestras actividades hace dos años y en el 2013 creamos la compañía  con tecnologías de control numérico  por computadora (CNC), es un sistema que permite controlar en todo momento la posición de un elemento físico, normalmente una herramienta que está montada en una máquina. Inicialmente nos capacitamos en otros países ya que en el nuestro no encontramos las herramientas ni estudios los cuales necesitábamos para nuestro progreso , ahora capacitamos a nuestros empleados  e incorporamos a personas con discapacidad para que ellos sean los beneficiarios de nuestras logros, nuestra producción se basa en anillos de graduación de diferentes materiales como plata(silver), palladium, acero inoxidable(stainless steel) oro(gold) 18k,10k,tambien argollas de grado para los estudiantes en su acto de graduación, anillos de matrimonio (alianzas)argollas de matrimonio en dos tonos oro amarillo y oro rojo y oro rosado, también fabricamos dijes, anillos de compromiso, solitarios, anillos de quince, anillos personalizados a su gusto . Facilitamos diferentes clases de envolturas o estuches importados  para las diferentes clases de gustos y diferente clase de anillos o mancuernas , gemelos para camisas y empresas, bancos etc. <br>
 Ahora estamos adquiriendo nuevas tecnologías que nos harán  competir con precios, calidad y cortos tiempos de entrega de producción  así mismo nos lleva a entrar en mercado internacionales para satisfacer algunas necesidades de otros países como latinoamericanos y americanos y darles un mejor trato 
</p><br>
    
    <a href="#" class="FloatRight close">
      <img src="img/exit.png" alt="">
    </a>
  </div>
</div>
  
</body>

</html>