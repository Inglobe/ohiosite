<?php 

include_once './db_connect.php';
$db = new DB_Connect();
$db->connect();

$id=$_POST["id"]; 
$valor = stripslashes($_POST["value"] );

$insert = @mysql_query("UPDATE texts SET english = '$valor' WHERE id_element = '$id'");


echo $valor;

?>