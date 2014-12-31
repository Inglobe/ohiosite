<?php 
session_start();

//verifico que la sesión esté activa

if(!$_SESSION["active"]){
	header('Location: logout.php');
}
 ?>