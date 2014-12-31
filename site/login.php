<?php

//conexión a la base de datos
include_once './db_connect.php';
$db = new DB_Connect();
$db->connect();

//recibo los datos por POST
$user = strip_tags($_POST['user']);
$pass = strip_tags($_POST['pass']);

//consulta para verificar existencia de usuario.
$query = @mysql_query('SELECT * FROM usuarios WHERE usu_codigo = "'.mysql_real_escape_string ($user).'"');
if($existe = @mysql_fetch_object($query)){
	passCheck($user, $pass);
} else header('Location: index.php?error=si#SignIn');

//controla que la contraseña ingresada coincida con el usuario.
function passCheck($user, $pass){

	$passQuery = @mysql_query('SELECT * FROM usuarios WHERE usu_password = "'.mysql_real_escape_string ($pass).'" && usu_codigo = "'.mysql_real_escape_string ($user).'"');
		if($existePass = @mysql_fetch_object($passQuery)){
				session_start();
				$_SESSION["username"] = $user;
				$_SESSION["active"] = true;
				$consultaRodeo = @mysql_query('SELECT usu_rodeo FROM usuarios WHERE usu_codigo = "'.mysql_real_escape_string ($user).'"');
				$resultado = @mysql_fetch_array($consultaRodeo);
				$_SESSION["rodeo"] = $resultado["usu_rodeo"];
				header('Location: registers.php');

		} else header('Location: index.php?error=si#SignIn');
	
	
}



?>
