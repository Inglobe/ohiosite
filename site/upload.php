<?php
	/*En php recibimos las variables de nuestro formulario 
	Como lo haríamos normalmente, en este caso solo es una. */
	
	$file = $_FILES['pdffile'];
	$data = array('success' => false);
	
	//Validamos si se subió 
	if( is_uploaded_file($_FILES['pdffile']['tmp_name']) ){
		$data = array('success' => true);
	}
	if($_FILES['pdffile']['type']!='application/pdf'){
		header('Location: index.php?upstatus=err#services');
	}else {
		$origen = $_FILES['pdffile']['tmp_name'];
		$_FILES['pdffile']['name']='instructions.pdf';
	    $destino = '../pdf instructions file/'.$_FILES['pdffile']['name'];
	    move_uploaded_file($origen, $destino);
	    header('Location: index.php?upstatus=ok#services');
	}

	
	
	//Codificamos el array a JSON (Esta sera la respuesta AJAX) 
	echo json_encode($data);
?>
