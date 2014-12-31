function wait(){
	document.getElementById('upload_wait_img').style.visibility='visible';
	document.getElementById('upload_wait_img').style.display='block';
	document.getElementById('upload_status_txt').innerHTML="Uploading...";
	document.getElementById('upload_status_txt').style.visibility="visible";
	document.getElementById('upload_status_txt').style.display='block';
	//document.getElementById('uploadPdf_btn').style.visibility='hidden';
	//document.getElementById('uploadPdf_btn').style.display='none';
}