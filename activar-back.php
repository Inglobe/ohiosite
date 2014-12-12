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

	$headers = 'From: ignacio@inglobe.com' . "\r\n" .
    'Reply-To: ignacio@inglobe.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $to = $_POST["email"];
    if($_POST["active"] == "1") {
    	$subject = "Your account ".$usuario." has been activated.";
    	$body = "<h3>".$usuario.", your account has been activated by the admin user. Now you can enter our site and enjoy our services!</h3>"; 
    } else {
    	$subject = "Your account ".$usuario." has been desactivated.";
    	$body = "<h3>Your account ".$usuario." has been desactivated. If you still want to use it, please contact the administrator.</h3>";
    }

	mail($to, $subject, $body, $headers);
}
 ?>