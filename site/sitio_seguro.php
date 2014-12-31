<?php 
include("session_checker.php");
echo "Bienvenido ".$_SESSION['username']."!<br />Tu rodeo es: ".$_SESSION['rodeo'];
 ?>
 <a href="logout.php">Cerrar Sesi&oacute;n</a>