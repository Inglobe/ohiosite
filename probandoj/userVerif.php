<?php 
	if(isset($_POST['user'])){
		include_once('db_connect.php'); 
		$usuario = $_POST['user'];
	} 
$consulta2 = "SELECT * from sucursal where usu_codigo = '$usuario';";
$ejecutar_consulta2 = mysql_query($consulta2);
echo "<option value='-1'>- - -</option>";
if($existePass = @mysql_fetch_object($ejecutar_consulta2)){
	echo "true";
} else echo "false";

?>