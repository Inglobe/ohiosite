<?php 

include_once './db_connect.php';
$db = new DB_connect();
$db->connect();

$sql ="SELECT usu_codigo FROM usuarios WHERE usu_active = 1 ORDER BY usu_codigo";
$result = mysql_query($sql);
$i=1;
while($rec = mysql_fetch_assoc($result, MYSQL_ASSOC)) {
	echo "<option value=".$rec["usu_codigo"].">".$rec["usu_codigo"]."</option>";
	echo "</tr>";
	$i++;
}
 ?>