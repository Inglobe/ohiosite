<?php 
if(isset($_POST['active']) && isset($_POST['usuario'])){
	include_once './db_connect.php';
	$db = new DB_connect();
	$db->connect();
	$active = $_POST['active'];
	$usuario = $_POST['usuario'];
	$sql = "UPDATE usuarios SET usu_active = ".$active." WHERE usu_codigo = '".$usuario."'";
	mysql_query($sql);
	echo $active;

	$headers = 'From: info@test.ecalvin.com' . "\r\n" .
    'Reply-To: info@test.ecalvin.com' . "\r\n" .
    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $to = $_POST["email"];
    if($_POST["active"] == "1") {
    	$subject = "Your account ".$usuario." has been activated.";
    	$body = "<p>Dear ".$usuario.",</p><br /><p>Your account has been activated.<br />Please, visit our web site to download the App.</p><br /><br /><h5>Thank you, <br />Calving App Team.</h5>"; 
    } /*else {
    	$subject = "Your account ".$usuario." has been desactivated.";
    	$body = "<h3>Your account ".$usuario." has been desactivated. If you still want to use it, please contact the administrator.</h3>";
    }*/

	mail($to, $subject, $body, $headers);
}
 ?>
