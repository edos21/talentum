<?php
    try{
        $sql = 'SELECT * FROM materiales';
        
        $s = $pdo->prepare($sql);
        $s->execute();
    } catch(PDOException $e){
        echo 'error al seleccionar la tabla';
        exit();
    }
    while($row = $s->fetch()){
		$materiales[] = array(
			'nombre'=>$row['nombre'],
			'precio'=>$row['precio'],
			'estado'=>$row['estado']);
	}
  foreach($materiales as $material): ?>
    
    <p>Precio del <?php echo $material['nombre']; ?></p>
    <p><?php echo $material['precio']; ?> $
      <img src="Flecha<?php echo $material['estado'];?>.png" alt="">
      
    </p>
    
  <?php 
  
  endforeach;
  
    ?>
