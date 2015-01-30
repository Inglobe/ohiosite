<?php
	/*En php recibimos las variables de nuestro formulario 
	Como lo haríamos normalmente, en este caso solo es una. */
	
	$file = $_FILES['privacy'];
	$data = array('success' => false);
	
	//Validamos si se subió 
	if( is_uploaded_file($_FILES['privacy']['tmp_name']) ){
		$data = array('success' => true);
	}
	if($_FILES['privacy']['type']!='application/pdf'){
		header('Location: index.php?upstatus=err#portfolio');
	}else {
		$origen = $_FILES['privacy']['tmp_name'];
		$_FILES['privacy']['name']='privacy.pdf';
	    $destino = '../privacy policy/es/'.$_FILES['privacy']['name'];
	    move_uploaded_file($origen, $destino);
	    header('Location: index.php?upstatus=ok#portfolio');
	}

	
	
	//Codificamos el array a JSON (Esta sera la respuesta AJAX) 
	/*echo json_encode($data);*/
?>
