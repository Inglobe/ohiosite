<?php

include_once './db_connect.php';
$db = new DB_Connect();
$db->connect();


$user = strip_tags($_POST['user']);
$pass = strip_tags($_POST['pass']);

$query = @mysql_query('SELECT * FROM usuarios WHERE usu_codigo = "'.mysql_real_escape_string ($user).'"');
if($existe = @mysql_fetch_object($query)){
	userCheck($user, $pass);
} else echo 'usuario inexistente';

function userCheck($user, $pass){

	$passQuery = @mysql_query('SELECT * FROM usuarios WHERE usu_password = "'.mysql_real_escape_string ($pass).'"');
		if($existePass = @mysql_fetch_object($passQuery)){
				echo 'logged in successfully';
				//session_start();
				$_SESSION["username"] = $user;
				$rodeoQuery = @mysql_query('SELECT usu_rodeo FROM usuarios WHERE usu_codigo = "'.mysql_real_escape_string ($user).'"');
				$_SESSION["rodeo"] = $rodeoQuery["usu_rodeo"];
				echo $_SESSION["rodeo"];
				


		} else echo 'wrong password';
	
	
}



?>
