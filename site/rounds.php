<?php 
include_once 'session_checker.php';
include_once 'lang/common.php';
if(!isset($_SESSION["lang"])) {
  $_SESSION["lang"] = "en"; 
}
?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="">
    <meta name="author" content="">
    
	  <title><?php echo $lang["title_rounds"]; ?></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <script type="text/javascript" src="../js/jquery.js"></script>

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
    <link rel="shortcut icon" href="../img/favicon.png" >
    <style type="text/css">
        body {
            background-color: #ecf0f1;
        }
        .footer {
            background-color: #000;
            vertical-align: center;
            position: relative;
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
        #formulario {
            display: inline-block;
            margin-bottom: 10px;
            margin-top: 20px;
            float: none;
        }
    </style>

    <script type="text/javascript">
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }    
    </script>
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
                <?php 
                    if($_SESSION['lang']=='es'){
                        echo "<li><a href='registers.php?lang=es' id='nav_registers'>".$lang['nav_registers']."</a></li>";
                        echo "<li><a href='index.php?lang=es' id='nav_backhome'>".$lang['nav_backhome']."</a></li>";
                        echo "<li><a id='log_nav' href='logout.php?lang=es'>".$lang['log_nav']." (".$_SESSION['username'].")</a></li>";
                        if ($_SESSION['username']=='admin'){
                            echo "<li><a href='accounts.php?lang=es' id='nav_accounts'>".$lang['nav_accounts']."</a></li>";
                            echo "<li class='current'><a href='rounds.php?lang=es' id='nav_rounds'>".$lang['nav_rounds']."</a></li>";
                        }
                        if($_SESSION['lang']=='es'){
                          echo '<li><a href="rounds.php?lang=en">English</a></li>';
                        } elseif ($_SESSION['lang']=='en') {
                          echo '<li><a href="rounds.php?lang=es">Español</a></li>';
                        }
                    } else if($_SESSION['lang']=='en'){
                        echo "<li><a href='registers.php?lang=en' id='nav_registers'>".$lang['nav_registers']."</a></li>";
                        echo "<li><a href='index.php?lang=en' id='nav_backhome'>".$lang['nav_backhome']."</a></li>";
                        echo "<li><a id='log_nav' href='logout.php?lang=en'>".$lang['log_nav']." (".$_SESSION['username'].")</a></li>";
                        if ($_SESSION['username']=='admin'){
                            echo "<li><a href='accounts.php?lang=en' id='nav_accounts'>".$lang['nav_accounts']."</a></li>";
                            echo "<li class='current'><a href='rounds.php?lang=en' id='nav_rounds'>".$lang['nav_rounds']."</a></li>";
                        }
                        if($_SESSION['lang']=='es'){
                          echo '<li><a href="rounds.php?lang=en">English</a></li>';
                        } elseif ($_SESSION['lang']=='en') {
                          echo '<li><a href="rounds.php?lang=es">Español</a></li>';
                        }
                    }
                 ?>
              </ul> 

          </nav> <!-- /nav-wrap -->       

       </div> <!-- /header-inner -->

   </header> 

    <section id="contenido">     
        <div id="separator">
            &nbsp;
        </div>
        <div class='row' id="formulario">
          <div class='six columns mob-whole'> 
            <form class='form-signin' role='form' method ='post' action ='alter-rodeo.php' name ='datos_rodeo_form' id='form_rodeo' enctype='application/x-www-form-urlencoded'>
                <select required name="user_name">
                  <?php include("activar-combo.php"); ?>
                </select>
                <input onkeypress="return isNumberKey(event)" class="form-control" id="new_rodeo_number" placeholder="<?php echo $lang["round"]; ?>" name="rodeo"><br>
            </form>  
            <button class='btn btn-lg btn-primary btn-block' id='chg_rodeo_btn'><?php echo $lang["change_rodeo"] ?></button>
          </div>
        </div>

        
    </section>
    <!-- Footer
   ================================================== -->
   <?php 
      include_once 'footer.php';
    ?>

    <script type="text/javascript">
        $("#chg_rodeo_btn").click(function() {
            if(!document.getElementById( "new_rodeo_number" ).value || document.getElementById( "new_rodeo_number" ).value < 2) {
              alert("<?php echo $lang['wrong_rodeo']; ?>");
            } else {
              document.getElementById( "form_rodeo" ).submit();
            }
        });
    </script>

    <!-- Java Script
   ================================================== -->
    <script src="../plugins/puremedia/mainmob.js"></script>
</body>
</html>