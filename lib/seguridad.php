<?php


if ($_SESSION['login'] != true){
	header('location: ingreso.php?sesion');
}