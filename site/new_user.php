<?php

include_once './db_connect.php';
$db = new DB_Connect();
$db->connect();


$user = strip_tags($_POST['user']);
$userName = strip_tags($_POST['user_name']);
$pass = strip_tags($_POST['pass']);
$pass2 = strip_tags($_POST['pass2']);
$userSur = strip_tags($_POST['user_surname']);
$userMail = strip_tags($_POST['user_mail']);

$query = @mysql_query('SELECT * FROM usuarios WHERE usu_codigo = "'.mysql_real_escape_string ($user).'"');
if($existe = @mysql_fetch_object($query)){

	header('Location: newUserForm.php?error=si');

} elseif ($pass != $pass2){

	header('Location: newUserForm.php?passError=si');

} else {
	$nombre = $userName." ". $userSur;
	$insertar = @mysql_query("INSERT INTO usuarios (usu_codigo, usu_nombre, usu_password, usu_email) values ('$user', '$nombre', '$pass', '$userMail')");
		echo $insertar;
		echo "<br>".$nombre. " ha sido registrado correctamente . Recibir&aacute; un email cuando el administrador active su cuenta.";
}


function userRegister($us, $userN, $pas, $ap, $mail){
	echo $user." ".$userName." ".$userSur." ".$pass." ".$userMail; 

	$nombre = $us." ". $ap;
	$insertar = @mysql_query('INSERT INTO usuarios (usu_codigo, usu_nombre, usu_pass, usu_email) values ($us, $nombre, $pas, $mail)');
		echo $insertar;
	

}

?>