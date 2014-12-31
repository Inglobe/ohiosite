function sendForm(form){
	/* Creamos un objeto FormData que es un formulario con 	enctype=multipart/form-data 
	y le pasamos como parametro el formulario HTML */

	var Data = new FormData(form);
	
	/* Creamos el objeto que hara la petición AJAX al servidor, debemos de validar si existe el objeto “ XMLHttpRequest” ya que en
	internet explorer viejito no esta, y si no esta usamos 
	“ActiveXObject” */
	
	if(window.XMLHttpRequest) {
		var Req = new XMLHttpRequest();
	}else if(window.ActiveXObject) {
		var Req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	//archivo del servidor con el que intercambiamos datos.
	Req.open("POST", "upload.php");
	
	/* Le damos un evento al request, esto quiere decir que cuando
	termine de hacer la petición, se ejecutara este fragmento de
	código */
	
	//Req.onload = function(Event) {
		//Validamos que el status http sea  ok
		//if (Req.status == 200) {
			/*Como la info de respuesta vendrá en JSON 
			la parseamos */
			//var st = JSON.parse(Req.responseText);
			
			//if(st.success){
				/*alert("File uploaded successfully!");
				document.getElementById('upload_wait_img').style.visibility='hidden';
				document.getElementById('upload_wait_img').style.display='none';
				document.getElementById('upload_wait_txt').style.visibility='hidden';
				document.getElementById('upload_wait_txt').style.display='none';
				document.getElementById('upload_pdf').style.visibility='visible';
				document.getElementById('upload_pdf').style.display='block';*/
			//} else{
				//alert("Ups...something went wrong. Please try again.");
			//}
		//} else {
		    	//console.log(Req.status); //Vemos que paso.
		//    	}
	//}; 

	/*Req.onprogress = function(Event){
		//imagen de cargando mientras se sube el archivo
		document.getElementById('upload_wait_img').style.visibility='visible';
		document.getElementById('upload_wait_img').style.display='block';
		document.getElementById('upload_wait_txt').style.visibility='visible';
		document.getElementById('upload_wait_txt').style.display='block';
		document.getElementById('upload_pdf').style.visibility='hidden';
		document.getElementById('upload_pdf').style.display='none';
	};*/

	
	//Enviamos la petición
	Req.send(Data);
	alert(Req.status);
}
