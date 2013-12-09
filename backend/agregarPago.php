<?php

include '../lib/conexion.php';
  
  try{

    $sql= 'SELECT * FROM clientes';

    $s = $pdo->prepare($sql);
    $s->execute();

  }

  catch(PDOException $e){

    echo "Error al cargar las categorias";
    exit();
  }

  while ($row = $s->fetch()) {
    
    $clientes[] = array(
      'correo' => $row['correo']);
  }

include '../includes/header.html';
?>
<div class="grid_4">
  <form action="guardarPago.php" method="post">
    <label>Correo del cliente</label>
    <input type="text" name="correo" id="correo" list="correos" autocomplete="off">
    <datalist id="correos">
     <?php foreach($clientes as $cliente): ?>
      <option value="<?= $cliente['correo'] ?>">
      <?php endforeach; ?>
    </datalist>
    <label for="tipo">Forma de Pago*</label>
    <select name="tipo" id="tipo">
      <option value="">Seleccione...</option>
      <option>Efectivo</option>
      <option>Cheque</option>
      <option>T. Debito</option>
      <option>T. Credito</option>
      <option>Deposito</option>
      <option>Transferencia</option>
    </select><br>
    <label for="ndocumento">Nro de Documento*</label>
    <input type="text" name="ndocumento" id="ndocumento"><br>
    <label for="monto">Monto*</label>
    <input type="text" name="monto" id="monto"><br>
    <label for="observaciones">Observaciones</label><br>
    <textarea name="observaciones" id="observaciones" cols="50" rows="8" style="resize:none"></textarea><br>
    <label for="estado">Estado</label>
    <select name="estado" id="estado">
      <option value="">Seleccione...</option>
      <option>Espera</option>
      <option>Aprobado</option>
    </select>
    <input type="submit" value="Pagar">
  </form>
</div>
<?php include '../includes/footer.html'; ?>