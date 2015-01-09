<?php 

include_once './db_connect.php';
$db = new DB_connect();
$db->connect();

$sql ="SELECT usu_codigo, usu_nombre, usu_email, usu_rodeo, usu_active FROM usuarios";
$result = mysql_query($sql);
$i=1;
while($rec = mysql_fetch_assoc($result, MYSQL_ASSOC)) {
	if($rec["usu_active"] == "1") {
		$clase = "success";
		$check = "checked";
	} else {
		$clase = "danger";
		$check = "";
	}
	echo "<tr class='".$clase."' id='row-".$i."'>";
	echo "<td id='usu$i'>".$rec["usu_codigo"]."</td>";
	echo "<td>".$rec["usu_nombre"]."</td>";
	echo "<td>".$rec["usu_email"]."</td>";
	echo "<td>".$rec["usu_rodeo"]."</td>";
	echo "<td><div class='checkbox'><input type='checkbox' value='".$rec["usu_codigo"]."$".$rec["usu_email"]."' id='chk-".$i."' name='chk-".$i."' ".$check." href='javascript:;' onchange=\"activarUsuario('chk-".$i."', 'row-".$i."', $('#chk-".$i."').val());return false;\"/></div></td>";
	echo "</tr>";
	$i++;
}
 ?>