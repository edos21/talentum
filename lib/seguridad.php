<?php


if ($_SESSION['login'] != true){
	header('location: ../ingreso.php?sesion');
}

if ($_SESSION['admin'] != true{
	header ('location: ../ingreso.php?sesion');
}
