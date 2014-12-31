<?php
//conexion a la base de datos
include_once 'db_connect.php';
$con = new DB_Connect();
$con->connect();
//recibo variables por POST
$user = $_POST['user'];
//echo 'usuario logueado: '.$user;
$oldPassTyped = $_POST['old_pass'];
//echo '<br /> oldPassTyped: '.$oldPassTyped;
$newPass1 = $_POST['new_pass1'];
//echo '<br />newPass1: '.$newPass1;
$newPassConfirm = $_POST['new_pass2'];
//echo '<br /> newPassConfirm: '.$newPassConfirm;
//consulta para seleccionar el usuario que quiere cambiar la pass
$query = @mysql_query('SELECT * FROM usuarios WHERE usu_codigo = "'.mysql_real_escape_string ($user).'"');
//echo '<br />consulta ok: '.$query;
//paso la fila a un array
$arrayResult = @mysql_fetch_array($query);
//echo '<br />fetch_array ok: '.$arrayResult;
//verifico que las pass viejas y nuevas coincidan. Si coinciden, actualizo la fila en la db.
$oldPassReal = $arrayResult['usu_password'];
//echo '<br />oldPassReal: '.$oldPassReal;

if ($oldPassReal == $oldPassTyped) {
	if($new_pass1 == $new_pass2) {
		$insert = @mysql_query("UPDATE usuarios SET usu_password = '$newPassConfirm' WHERE usu_codigo = '".mysql_real_escape_string ($user)."'");
		header('Location: index.php?chg=ok#SignIn');
	} else {
		header('Location: index.php?chg=no#SignIn');
	}
} else header('Location: index.php?chg=no#SignIn');




 ?>