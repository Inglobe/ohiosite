<?php

include_once './db_connect.php';
$db = new DB_Connect();
$db->connect();



$userName = strip_tags($_POST['user_name']);
$rodeo = strip_tags($_POST['rodeo']);

$insertar = @mysql_query('UPDATE usuarios SET usu_rodeo = '.$rodeo.' WHERE usu_codigo = "'.mysql_real_escape_string ($userName).'"');
header('Location: accounts.php');
?>