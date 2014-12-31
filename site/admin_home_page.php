<?php 
include("session_checker.php");
//chequea que sea el admin
if(!$_SESSION['username']=='admin'){
	header('Location: access_denied.html');
} else header('Location: ../editable/edit_page.php')
 ?>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 
 </body>
 </html>