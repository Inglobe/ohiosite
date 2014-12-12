<!DOCTYPE hmtl>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
    <meta name="author" content="">
	<title>Gesti&oacute;n de cuentas</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="./css/signin.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		function activarUsuario(id, rowId, usuarioyemail) {
			if(!confirm('Are you sure you want to activate/disactivate this account? The user will receive an email being notified.')){
				document.getElementById(id).checked = !document.getElementById(id).checked;
				return;
			}
			var campos = usuarioyemail.split("$");
			var valor;
			if(document.getElementById(id).checked) {
				valor = 1;
				$("#" + rowId).removeClass('danger');
				$("#" + rowId).addClass('success');
			} else {
				valor = 0;
				$("#" + rowId).removeClass('success');
				$("#" + rowId).addClass('danger');
			}
			
			var parametros = {"active" : valor, "usuario" : campos[0], "email" : campos[1]};
        		$.ajax({
        			data: parametros,
        			url: 'activar-back.php',
        			type: 'post',
        			beforeSend: function(){
        			},
        			success: function (response){
        			}
        		});
		}
	</script>
</head>
<body>
	<input type="image" src="img/en.png" onclick="changeLanguage('en');" style="height:2%;width:2%;margin-left:93%;"/>
	<input type="image" src="img/es.jpg" onclick="changeLanguage('es');" style="height:2%;width:2%;" />
	<header class="header">
        <div id="header-content">
            <h4><a href="#">Ohio | Inglobe</a></h4>            
            <nav>
                <ul>
                    <li><a href="registros.php">Tabla</a></li>
                    <li><a href="gestion-cuentas.php">Cuentas</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="banner">
    </div>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Username</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Activar</th>
				</tr>
			</thead>
			<tbody>
				<?php include("activar-tabla.php") ?>
			</tbody>
		</table>
	</div>
	<footer class="footer">
        Inglobe 2014 - All rights reserved 
    </footer>
</body>
</html>