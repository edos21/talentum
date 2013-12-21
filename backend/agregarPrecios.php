<?php
	
	include ('../includes/header.html');

?>
		<div id="content">
			<h2>Agregar Precios</h2>
        <div class="push_10">
          <a class="BtnVolver" href="menu.html.php">Volver</a>
        </div>
			<form method="post" action="guardarPrecios.php">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" id="descripcion">
				<label for="monto">Monto</label>
				<input type="text" name="monto" id="monto">
                <div class="Botonera" style="margin:40px 0 10px 0 " >
                  <input type="submit" value="Guardar">
                </div>
			</form>
		</div>
<?php

	include ('../includes/footer.html');

?>