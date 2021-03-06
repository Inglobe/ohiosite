<?php 
	$_SESSION["lang"] = "en";
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
    <meta name="author" content="">
	<title>Gesti&oacute;n de cuentas</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        function activarUsuario(id, rowId, usuario) {
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
            
            var parametros = {"active" : valor, "usuario" : usuario};
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



   <!-- Mobile Specific Metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="../css/base.css">
     <link rel="stylesheet" href="../css/mainmod.css">
   <link rel="stylesheet" href="../css/media-queries.css">  
   <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">           

   <!-- Script
   =================================================== -->
    <script src="../plugins/puremedia/modernizr.js"></script>

   <!-- Favicons
    =================================================== -->
    <link rel="shortcut icon" href="favicon.png" >
    <style type="text/css">
        body {
            background-color: #ecf0f1;
        }
        .footer {
            background-color: #000;
            vertical-align: center;
        }

        #tabla {
            height: 100px;
            background-color: #0F0;
        }
        #jqxgrid {
            margin-top: 40px;
        }
        #separator {
            height: 72px;
            background-color: #000;
        }
        #contenido {
            height: 100%;
        }
    </style>
</head>
<body>
   

   <!-- Header
   =================================================== -->
   <header id="main-header">

    <div class="row header-inner">

          <div class="logo">
             <a class="smoothscroll" href="#hero">Calvin App.</a>
          </div>

          <nav id="nav-wrap">         
             
             <a class="mobile-btn" href="#nav-wrap" title="Show navigation">
                <span class='menu-text'>Show Menu</span>
                <span class="menu-icon"></span>
             </a>
            <a class="mobile-btn" href="#" title="Hide navigation">
                <span class='menu-text'>Hide Menu</span>
                <span class="menu-icon"></span>
            </a>         

             <ul id="nav" class="nav">
                <li class="current"><a class="smoothscroll" href="#hero">Home</a></li>
                 <li><a class="smoothscroll" href="#portfolio">About the app</a></li>
                <li><a class="smoothscroll" href="#services">How to use it</a></li>
                <li><a class="smoothscroll" href="#about">Download</a></li>
              <li><a class="smoothscroll" href="#table">Registers</a></li>
                <li><a class="smoothscroll" href="#SignIn">Sign in</a></li>             
                <li><a class="smoothscroll" href="#contact">Create an account</a></li>
             </ul> 

          </nav> <!-- /nav-wrap -->       

       </div> <!-- /header-inner -->

   </header> 

    <section id="contenido">     
        <div id="separator">
            &nbsp;
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
    </section>
    <!-- Footer
   ================================================== -->
   <footer class="footer">
        <div class="row">
            <p class="copyright">&copy;Copyright 2014 Inglobe.</p>      
        </div>
   </footer> <!-- /footer -->
</body>
</html>