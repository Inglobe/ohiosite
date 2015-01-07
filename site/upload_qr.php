<?php
	/*En php recibimos las variables de nuestro formulario 
	Como lo haríamos normalmente, en este caso solo es una. */
	
	$file = $_FILES['qrcode'];
	$data = array('success' => false);
	
	//Validamos si se subió 
	if( is_uploaded_file($_FILES['qrcode']['tmp_name']) ){
		$data = array('success' => true);
		//echo "se subió <br />";
	} else header('Location: index.php?qrupstatus=err#about'); //else echo "no se subió";
	if($_FILES['qrcode']['type']!='image/png'){
		//echo $_FILES['qrcode']['type']."<br />";
		header('Location: index.php?qrupstatus=err#about');
		//echo "formato no aceptado<br />";
	}else {
		$origen = $_FILES['qrcode']['tmp_name'];
		//cambio el nombre del archivo subido a "qrcode.png"
		$_FILES['qrcode']['name']='qrcode.png';
		//seteo el destino donde voy a guardar el archivo
	    $destino = '../img/'.$_FILES['qrcode']['name'];
	    //copio el archivo al directorio destino
	    move_uploaded_file($origen, $destino);
	    //echo "ok";
	    header('Location: index.php?qrupstatus=ok#about');
	}

	
	
	//Codificamos el array a JSON (Esta sera la respuesta AJAX) 
	echo json_encode($data);
?>
