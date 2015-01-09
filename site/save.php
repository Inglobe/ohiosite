<?php 
session_start();
include_once './db_connect.php';
$db = new DB_Connect();
$db->connect();

$id=$_POST["id"]; 
$valor = stripslashes($_POST["value"] );
$lang = $_SESSION['lang'];

$insert = @mysql_query("UPDATE texts SET $lang = '$valor' WHERE id_element = '$id'");


echo $valor;

?>