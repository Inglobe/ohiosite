<?php 
//conexion a la base de datos
include_once './db_connect.php';
$db = new DB_Connect();
$db->connect();

//verifico que el mail sea correcto
$user = $_POST['user'];
$mail_typed = $_POST['mail'];
$mail_query @mysql_query('SELECT * FROM usuarios WHERE usuario = "'.mysql_real_escape_string ($user).'"');
$array = @mysql_fetch_array($mail_query);
$mail_real = $array['usu_email'];

//si coincide, genero la clave y mando el mail.
if ( $mail_typed == $mail_real ) {
	$rand_pass = RandomString(15,TRUE,TRUE,TRUE);

	//guardo en la base de datos la nueva clave generada
	$pass= @mysql_query('UPDATE usuarios SET usu_password = "$rand_pass" WHERE usu_codigo = "'.mysql_real_escape_string ($user).'"');
	$headers = 'From: info@test.ecalvin.com' . "\r\n" .
    'Reply-To: info@test.ecalvin.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $to = $mail_real;
    $subject = $usuario." change your password.";
    $body = "<h3>Dear ".$usuario.", we received a request to change your password. <br />A new password was automatically generated for your account. Please use this key to login and create a new password.<br />This is your new password: ".$rand_pass."<br /><br />Thank you, <br />Calving App Team.</h3>"; 
    mail($to, $subject, $body, $headers);
    header('Location: index.php?success=true');
} else header('Location: index.php?success=false');

//genera el string aleatorio
function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE)
{
    $source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
    return $rstr;
}



 ?>