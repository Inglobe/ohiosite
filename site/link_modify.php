<?php 

$link = $_POST['link_txt'];

$file = fopen('download/download_link(DO NOT EDIT THIS FILE!).txt', 'w') or
	die("ERROR OPENING FILE");

fwrite($file, $link);
fclose($file);
header('Location: index.php');

 ?>