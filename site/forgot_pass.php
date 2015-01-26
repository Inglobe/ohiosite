<?php 
//conexion a la base de datos
include_once './db_connect.php';
$db = new DB_Connect();


try{
    $db->connect();
} catch (Exeption $e) {
    echo $e->getMessage();
}

//verifico que el mail sea correcto
$user = $_POST['user_fg'];
$mail_typed = $_POST['mail_fg'];
$mail_query = @mysql_query('SELECT * FROM usuarios WHERE usu_codigo = "'.mysql_real_escape_string ($user).'"');
//echo $mail_query;
$array = @mysql_fetch_array($mail_query);
$mail_real = $array['usu_email'];
//echo "<br />mail: ".$mail_real;
//echo "<br />mail escrito: ".$mail_typed;

//si coincide, genero la clave y mando el mail.
if ( $mail_typed == $mail_real ) {
	$rand_pass = RandomString(15,TRUE,TRUE,FALSE);
    //echo "<br />".$rand_pass;

	//guardo en la base de datos la nueva clave generada
	$pass= @mysql_query("UPDATE usuarios SET usu_password = '$rand_pass' WHERE usu_codigo = '".mysql_real_escape_string ($user)."'");
	
    //mando el mail
    $headers = "From: info@test.ecalvin.com\r\n" .
    "Reply-To: info@test.ecalvin.com\r\n".
    "Content-type: text/html; charset=iso-8859-1\r\n" .
    "X-Mailer: PHP/" . phpversion();
    $to = $mail_real;
    $subject = "Forgot your password";
    $body = "<p>Dear ".$user.",</p><p>We received a request to change your password. <br />A new password was automatically generated for your account. Please use this key to login and create a new password. </p><br /><br /><h4>This is your new password: ".$rand_pass."</h4><br /><h5>Thank you, <br />Calving App Team.</h5>"; 
    mail($to, $subject, $body, $headers);
    header('Location: index.php?success=true#SignIn');
} else header('Location: index.php?success=false#SignIn');

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
