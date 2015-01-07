<?php
	/*En php recibimos las variables de nuestro formulario 
	Como lo haríamos normalmente, en este caso solo es una. */
	
	$file = $_FILES['qrcode'];
	$data = array('success' => false);
	
	//Validamos si se subió 
	if( is_uploaded_file($_FILES['qrcode']['tmp_name']) ){
		$data = array('success' => true);
		echo "se subió <br />";
	} else echo "no se subió";
	if($_FILES['qrcode']['type']!='image/jpeg' || $_FILES['qrcode']['type']!='image/png'){
		//header('Location: index.php?qrupstatus=err#about');
		echo "es el formato adeacuado<br />";
	}else {
		$origen = $_FILES['qrcode']['tmp_name'];
		$_FILES['qrcode']['name']='qrcode.png';
	    $destino = '../img/'.$_FILES['qrcode']['name'];
	    move_uploaded_file($origen, $destino);
	    echo "formato no aceptado";
	   // header('Location: index.php?qrupstatus=ok#about');
	}

	
	
	//Codificamos el array a JSON (Esta sera la respuesta AJAX) 
	echo json_encode($data);
?>
