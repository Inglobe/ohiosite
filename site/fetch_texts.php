<?php
include_once './db_connect.php';
$db = new DB_Connect();
$db->connect();

class fetch_texts {

	function __construct() {
 
    }

    public function fetchText ($id) {
    	$consulta = @mysql_query("SELECT english FROM texts WHERE id_element = '$id'" );
		$resultado = @mysql_fetch_array($consulta);
		echo $resultado['english'];
	}

}


 ?>