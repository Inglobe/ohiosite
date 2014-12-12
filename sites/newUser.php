<?php

include_once './db_connect.php';
$db = new DB_Connect();
$db->connect();


$user = strip_tags($_POST['user']);
$userName = strip_tags($_POST['user_comp']);
$pass = strip_tags($_POST['pass']);

$query = @mysql_query('SELECT * FROM usuarios WHERE usu_codigo = "'.mysql_real_escape_string ($user).'"');
if($existe = @mysql_fetch_object($query)){
	echo 'El usuario '. $user .' ya existe. Por favor ingrese un nombre de usuario diferente. <br>';
} else userRegister($user, $userName, $pass);

function userRegister($user, $userName, $pass){

	$insertar = @mysql_query('INSERT INTO usuarios (u, userName, pass) values');

}

?>
