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

	header('Location: index.php?error=si#contact');

} elseif ($pass != $pass2){

	header('Location: index.php?passError=si#contact');

} else {
	$nombre = $userName." ". $userSur;
	$insertar = @mysql_query("INSERT INTO usuarios (usu_codigo, usu_nombre, usu_password, usu_email) values ('$user', '$nombre', '$pass', '$userMail')");
		//echo $insertar;
		//echo "<br>".$nombre. " ha sido registrado correctamente . Recibir&aacute; un email cuando el administrador active su cuenta.";

	//mando mail al admin
		 $headers = "From: info@ecalving.com\r\n" .
	    "Reply-To: info@test.ecalvin.com\r\n".
	    "Content-type: text/html; charset=iso-8859-1\r\n" .
	    "X-Mailer: PHP/" . phpversion();
	    $to= "info@ecalving.com";
	    $subject = "New user registered";
	    $body = "<p>Admin,</p><br /> <p>(This is an automatic message)<br />A new user ( ".$nombre." ) has been registered on the Calvin APP's website.<br />Please visit the site, login with the admin account and check the 'Accounts' section for further details and/or activate the new account.</p><br /><br /><p>Thank you, <br />Calvin App Website.</p>";
	    mail($to, $subject, $body, $headers);
		header('Location: index.php?reg=ok');
}


/*function userRegister($us, $userN, $pas, $ap, $mail){
	echo $user." ".$userName." ".$userSur." ".$pass." ".$userMail; 

	$nombre = $us." ". $ap;
	$insertar = @mysql_query('INSERT INTO usuarios (usu_codigo, usu_nombre, usu_pass, usu_email) values ($us, $nombre, $pas, $mail)');
		echo $insertar;
	

}*/

?>
