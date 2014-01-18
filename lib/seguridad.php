<?php


if ($_SESSION['admin'] != true){
	header ('location: ../backend/ingreso.php?sesion');
}


