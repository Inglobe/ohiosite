<?php 
include_once 'fetch_texts.php';
$text = new fetch_texts();
session_start();
include_once 'down_link_check.php';
include_once 'lang/common.php';
if (!isset($_SESSION['lang'])) {
  $_SESSION['lang']="en";
}
?>
<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
  <meta charset="utf-8">
	<title>eCalving</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="../css/base.css">
	 <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/media-queries.css"> 
   <link href="../css/jquery-ui.css" rel="stylesheet"> 
     


   <!-- Script
   =================================================== -->
	 <script src="../plugins/puremedia/modernizr.js"></script>

   <!-- Favicons
	=================================================== -->
	<link rel="shortcut icon" href="../img/favicon.png" >

      <style type="text/css">
        a {
          color: #439145;
        }
        #download_instructions {
          color: #439145;
        }
        #hero {
          height: 600px;
          max-height: 600px;
        }
        #flex-caption {
          width: 200px;
        }
        #change_pass {
          margin-top: 5px;
        }
        #i_forgot {
          margin-top: 5px;
        }
    </style>


</head>

<body class="homepage">
  <?php if($_GET['reg']=='ok'){ echo "<script>alert('Thank you! You will receive an e-mail once the account has been activated within 48 hours.');</script>";} ?>

   <div id="preloader"> 
	   <div id="status">
         <img src="../img/loader.gif" height="60" width="60" alt="">
         <div class="loader" id="loader"><?php echo $lang['loader']; ?></div>
      </div>
   </div>
   

   <!-- Header
   =================================================== -->
   <header id="main-header">
<i src="../img/en.png" height="30" width="30"></i>
   	<div class="row header-inner">
      <i src="../img/en.png" height="30px" width="30px"></i>

	      <div class="logo">
	         <a class="smoothscroll" href="#hero">eCalving</a>
	      </div>

	      <nav id="nav-wrap">         
	         
	         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">
	         	<span class='menu-text' id='showMenu'>Show Menu</span>
	         	<span class="menu-icon"></span>
	         </a>
         	<a class="mobile-btn" href="#" title="Hide navigation">
         		<span class='menu-text' id='hideMenu'>Hide Menu</span>
         		<span class="menu-icon"></span>
         	</a>         

	         <ul id="nav" class="nav">
	            <li class="current"><a class="smoothscroll" href="#hero" id='home'><?php echo $lang['home']; ?></a></li>
              <li><?php if($_SESSION['active']){
                echo "<a class='smoothscroll' href='#SignIn' id='myProf'>".$lang['myProf']."</a>";
              } else echo "<a class='smoothscroll' href='#SignIn' id='loginLogout'>".$lang['loginLogout']."</a>"; ?></li>
		          <li><a class="smoothscroll" href="#portfolio" id='aboutApp'><?php echo $lang['aboutApp']; ?></a></li>
	            <li><a class="smoothscroll" href="#services" id='howToUseIt'><?php echo $lang['howToUseIt']; ?></a></li>
	            <li><a class="smoothscroll" href="#about" id='download'><?php echo $lang['download']; ?></a></li>
              <?php 
                if(!$_SESSION['active']){
                  echo "<li><a class='smoothscroll' href='#contact' id='createAccount'>".$lang['createAccount']."</a></li>";
                }
                if($_SESSION['lang']=='es'){
                  echo '<li><a href="index.php?lang=en">English</a></li>';
                } elseif ($_SESSION['lang']=='en') {
                  echo '<li><a href="index.php?lang=es">Español</a></li>';
                }
               ?>
              

	         </ul> 
	      </nav> <!-- /nav-wrap -->	      

	   </div> <!-- /header-inner -->

   </header> 


   <!-- Hero
   =================================================== -->
   <section id="hero">	
   	  
		<div class="row hero-content">

			<div class="six columns flex-container">

			   <div id="hero-slider" class="flexslider">

				   <ul class="slides">

					   <!-- Slide -->
					   <li>
						   <div class="flex-caption">
								<?php
                if ($_SESSION['username']=='admin'){
                  echo "<h1 class='edit_area' id='slide1'>";
                  $text->fetchText("slide1", $_SESSION['lang']);
                  echo "</h1>"; 
                } else {
                  echo "<h1 id='slide1'>";
                  $text->fetchText("slide1", $_SESSION['lang']);
                  echo "</h1>";
                }
                 ?>														   
							</div>						
					   </li>

					   <!-- Slide -->
					   <li>						
							<div class="flex-caption">
								<?php
                if ($_SESSION['username']=='admin'){
                  echo "<h1 class='edit_area' id='slide2'>";
                  $text->fetchText("slide2", $_SESSION['lang']);
                  echo "</h1>"; 
                } else {
                  echo "<h1 id='slide2'>";
                  $text->fetchText("slide2", $_SESSION['lang']);
                  echo "</h1>";
                }
                 ?>									   
							</div>					
					   </li>

					   <!-- Slide -->
					   <li>
						   <div class="flex-caption">
								<?php
                if ($_SESSION['username']=='admin'){
                  echo "<h1 class='edit_area' id='slide3'>" ;
                  $text->fetchText("slide3", $_SESSION['lang']);
                  echo "</h1>"; 
                } else {
                  echo "<h1 id='slide3'>";
                  $text->fetchText("slide3", $_SESSION['lang']);
                  echo "</h1>";
                }
                 ?>										   
							</div>
					   </li>					              

				   </ul>

			   </div> <!--flexslider -->				   

	      </div> <!--flex-container -->      

		</div> <!--hero-content -->	   

   </section> <!--hero -->


    <!-- SignIn
   =================================================== -->
    <section id="SignIn">

    <div class="row section-head">

      <div class="twelve columns">

           <?php
           if(!$_SESSION['active']){
            echo "<h1 classid='contactTitle' id='signIn'>".$lang['signIn']."</h1>";
            echo "<hr />";
            echo "     <div class='row form-section'>
        
        <div id='contact-form' class='twelve columns'>

            <div class='row section-head'>
      <div id='contact-form' class='twelve columns'>

        <form role='form' method ='post' action='login.php'  enctype='application/x-www-form-urlencoded'>

          <fieldset>

          <div class='six columns mob-whole'>
            <input type='text' id='inputUsu' class='form-control' placeholder='".$lang['inputUsu']."' required name='user'>";

          if($_GET['error']=='si'){
              echo "<span autofocus id='userPassWrong'>".$lang['userPassWrong']."</span>";
          } elseif ($_GET['error']=='noActive') {
            //alert1 for lang
            echo "<script>alert('".$lang['alert1']."');</script>";
          }
          echo "</div>
          <div class='six columns mob-whole'>
            <input type='password' id='inputPassword' class='form-control' placeholder='".$lang['inputPassword']."' required name='pass'>
          </div>
          
          <button class='btn btn-lg btn-primary btn-block' type='submit' id='SignIn_btn'>".$lang['SignIn_btn']."</button>
          <button class='btn btn-lg btn-primary btn-block' id='i_forgot' type='button'>".$lang['i_forgot']."</button>
          <br />

        </fieldset>
        </form>
      </div>";
           } else {
            echo "<h1 classid='contactTitle' id='welcome'>".$lang['welcome'].$_SESSION['username'] ."!</h1>";
            echo "<hr />";
            echo "<p id='rodeo_txt'>".$lang['rodeo_txt'].$_SESSION['rodeo']."</p>";
            echo "<a href='registers.php'><button id='manage_btn'>".$lang['manage_btn']."</button><a>";
            echo "<button class='btn btn-lg btn-primary btn-block' type='submit' id='change_pass'>".$lang['change_pass']."</button>";
            echo "<a href='logout.php'><button id='chg_pass'>".$lang['chg_pass']."</button><a>";
            }
            ?>

        </div>
      </div>
<?php 

//alert_pass for lang.
if(isset($_GET['chg']) && $_GET['chg']=='ok'){
  echo "<script type='text/javascript'>
  alert('".$lang['alert_pass']."');
  </script>";
  //alert_wrong
} elseif (isset($_GET['chg']) && $_GET['chg']=='no') {
  echo '<script type="text/javascript">
  alert("'.$lang['alert_wrong'].'");
  </script>';
}
  

?>
 
    </div> 
  <div id="dialog-form" title="Change Password">
  <p class="validateTips" id='validateTips'><?php echo $lang['validateTips']; ?></p>
 
  <form id="change_pass_frm" method='post' action='change_pass.php' enctype='application/x-www-form-urlencoded'>
    <fieldset>
      <label for="name" id='old_lbl'><?php echo $lang['old_lbl']; ?></label>
      <input type="password" name="old_pass" id="old_pass" placeholder="<?php echo $lang['old_pass']; ?>" class="text ui-widget-content ui-corner-all">
      <span id="span_old_pass"></span>
      <label for="email" id='new_lbl'><?php echo $lang['new_lbl']; ?></label>
      <input type="password" name="new_pass1" id="new_pass1" placeholder="<?php echo $lang['new_pass1']; ?>" class="text ui-widget-content ui-corner-all">
      <span id="span_new_pass1"></span>
      <label for="password" id='repeat_lbl'>Repeat New Password</label>
      <input type="password" name="new_pass2" id="new_pass2" placeholder="<?php echo $lang['new_pass2']; ?>" class="text ui-widget-content ui-corner-all">
      <span id="span_new_pass2"></span>
      <?php echo "<input type='text' id='user' name='user' value='".$_SESSION['username']."' style='visibility:hidden; display:none;'>"; ?>
      
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form" title=<?php echo '"'.$lang['dialog-form'].'"'; ?>>
  <p class="validateTips" id='validate_1'><?php echo $lang['validate_1']; ?></p>
 
  <form id="i_forgot_frm" method='post' action='forgot_pass.php' enctype='application/x-www-form-urlencoded'>
    <fieldset>
      <label id='user_lbl'><?php echo $lang['user_lbl']; ?></label>
      <input type='text' name='user_fg' placeholder='<?php echo $lang['user_fg']; ?>' id='user_fg' class='text ui-widget-content ui-corner-all'>
      <span id="name_spn"></span>
      <label for="name" id='email_lbl'><?php echo $lang['email_lbl']; ?></label>
      <input type="text" name="mail_fg" id="mail_fg" placeholder="example@example.com" class="text ui-widget-content ui-corner-all">
      <span id="mail_spn"></span>
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<?php 
if(isset($_GET['success']) && $_GET['success']=='true'){
  echo "<script type='text/javascript'>
  alert('".$lang['alert2']."');
  </script>";

} elseif (isset($_GET['success']) && $_GET['success']=='false') {
  echo '<script type="text/javascript">
  alert("'.$lang['alert3'].'");
  </script>';
}
 ?>

</section> <!-- /SignIn -->


   <!-- About the app
   ================================================== -->
   <section id="portfolio">

      <div class="row section-head">

      	<div class="twelve columns">

	         <?php 

           if($_SESSION['username']=='admin'){
            echo "<h1 class='edit_area' id='aboutTitle'>";
            $text->fetchText("aboutTitle", $_SESSION['lang']);
            echo "</h1>";
            echo "<hr />";
            echo "<p class='edit_area' id='aboutText'>";
            $text->fetchText("aboutText", $_SESSION['lang']);
            echo "</p>";
           } else {
            echo "<h1 id='aboutTitle'>";
            $text->fetchText("aboutTitle", $_SESSION['lang']);
            echo "</h1>";
            echo "<hr />";
            echo "<p id='aboutText'>";
            $text->fetchText("aboutText", $_SESSION['lang']);
            echo "</p>";
           }

          ?>

	      </div>

      <div class="row">
        <?php 

        if($_SESSION['username']=='admin'){
          echo "<div class='twelve columns mob-whole'>

          <div class='service-list bgrid-third s-bgrid-half mob-bgrid-whole'>

            <div class='twelve columns mob-whole'>
                <div class='icon-part'>
                  <i class='icon-list'></i>                 
                </div>
                    
                <h3><a href='http://ohio.inglobe.com.ar/site/terms%20and%20conditions/".$_SESSION['lang']."/tcpp.pdf' id='download_conditions' target='_blank'>".$lang['download_conditions']."</a></h3>
                <h3><a href='../privacy policy/".$_SESSION["lang"]."/privacy.pdf' id='download_instructions2' target='_blank'>".$lang['download_privacy']."</a></h3>
            </div>

            <div class='twelve columns mob-whole'> 
                <div class='icon-part'>
                  <i class='icon-cloud-upload'></i>                 
                </div>
                    
                <h3 id='upload_terms'>".$lang['upload_terms']."</h3>
                <form action='upload_tyc_".$_SESSION['lang'].".php' method='post' id='form_tyc' enctype='multipart/form-data'>
                  <fieldset>
                    <input type='file' id='tyc' name='tyc'>
                    <button id='uploadPdfTyC_btn' type='submit' style='visibility:visible;'>".$lang['uploadPdf_btn']."</button>
                  </fieldset></form>
                <h3 id='upload_privacy'>".$lang['upload_privacy']."</h3>
                <form action='upload_privacy_".$_SESSION['lang'].".php' method='post' id='form_privacy' enctype='multipart/form-data'>
                  <fieldset>
                    <input type='file' id='privacy' name='privacy'>
                    <button id='uploadPdfPrivacy_btn' type='submit' style='visibility:visible;'>".$lang['uploadPdf_btn']."</button>
                  </fieldset></form>  

                  <span id='upload_status_txt' style='visibility:hiden; display:none;'></span>";
                  if(isset($_GET['upstatus']) && $_GET['upstatus']=='err'){
                    echo "<span id='upload_status_txt1'>".$lang['upload_status_txt1']."</span>";
                  } elseif (isset($_GET['upstatus']) && $_GET['upstatus']=='ok') {
                    echo "<span id='upload_status_txt2'>".$lang['upload_status_txt2']."</span>";
                  }                  

                echo "
                


            </div> <!--mob-whole-->



          </div> <!-- /service-list -->

        </div> <!-- /six -->";
        } else {
          echo "<div class='twelve columns'>

          <div class='service-list bgrid-third s-bgrid-half mob-bgrid-whole'>

                   
                 <h3><a href='../terms and conditions/".$_SESSION["lang"]."/tcpp.pdf' id='download_instructions1' target='_blank'>".$lang['download_conditions']."</a></h3>
                 <h3><a href='../privacy policy/".$_SESSION["lang"]."/privacy.pdf' id='download_instructions2' target='_blank'>".$lang['download_privacy']."</a></h3>


          </div> <!-- /service-list -->

        </div> <!-- /twelve -->";
        }
         ?>
        

      </div> <!-- /row -->      
      </div>

      <br /><br /><br /><br />
      
   </section> <!-- /Portfolio -->


   <!-- How to use Section
   ================================================== -->
   <section id="services">

   	<div class="row section-head">

   		<div class="twelve columns">

	         <?php 
           if($_SESSION['username']=='admin'){
            echo "<h1 class='edit_area' id='howToUseTitle'>";
            $text->fetchText("howToUseTitle", $_SESSION['lang']);
            echo "</h1>";
           } else {
            echo "<h1 id='howToUseTitle'>";
            $text->fetchText("howToUseTitle", $_SESSION['lang']);
            echo "</h1>";
           }
            ?>

	         <hr />

	         <?php 
           if ($_SESSION['username']=='admin'){
            echo "<p class='edit_area' id='howToUseText'>";
            $text->fetchText("howToUseText", $_SESSION['lang']);
            echo "</p>";
           } else {
            echo "<p id='howToUseText'>";
            $text->fetchText("howToUseText", $_SESSION['lang']);
            echo "</p>";
           }
            ?>

         </div>

      </div>
      <div class="row">
        <?php 

        if($_SESSION['username']=='admin'){
          echo "<div class='twelve columns mob-whole'>

          <div class='service-list bgrid-third s-bgrid-half mob-bgrid-whole'>

            <div class='twelve columns mob-whole'>
                <div class='icon-part'>
                  <i class='icon-list'></i>                 
                </div>
                    
                <h3><a href='http://ohio.inglobe.com.ar/site/pdf%20instructions%20file/".$_SESSION['lang']."/instructions.pdf' id='download_instructions' target='_blank'>Download instructions (PDF File)</a></h3>
            </div>

            <div class='twelve columns mob-whole'> 
                <div class='icon-part'>
                  <i class='icon-cloud-upload'></i>                 
                </div>
                    
                <h3 id='upload_pdf'>".$lang['upload_pdf']."</h3>
                <form action='upload_".$_SESSION['lang'].".php' method='post' id='form' enctype='multipart/form-data'>
                  <fieldset>
                    <input type='file' id='pdffile' name='pdffile'>
                    <button id='uploadPdf_btn' type='submit' style='visibility:visible;'>".$lang['uploadPdf_btn']."</button>
                  </fieldset>
                  
                  <span id='upload_status_txt' style='visibility:hiden; display:none;'></span>";
                  if(isset($_GET['upstatus']) && $_GET['upstatus']=='err'){
                    echo "<span id='upload_status_txt1'>".$lang['upload_status_txt1']."</span>";
                  } elseif (isset($_GET['upstatus']) && $_GET['upstatus']=='ok') {
                    echo "<span id='upload_status_txt2'>".$lang['upload_status_txt2']."</span>";
                  }                  

                echo "</form>
                
            </div> <!--mob-whole-->



          </div> <!-- /service-list -->

        </div> <!-- /six -->";
        } else {
          echo "<div class='twelve columns'>

          <div class='service-list bgrid-third s-bgrid-half mob-bgrid-whole'>


                <div class='icon-part'>
                  <i class='icon-arrow-down'></i>                 
                </div>
                    
                 <h3><a href='../pdf instructions file/".$_SESSION["lang"]."/instructions.pdf' id='download_instructions1' target='_blank'>".$lang['download_instructions1']."</a></h3>


          </div> <!-- /service-list -->

        </div> <!-- /twelve -->";
        }
         ?>
      	

      </div> <!-- /row -->      

   </section> <!-- /services -->   


   <!-- Download Section
   ================================================== -->
   <section id="about">

   	<div class="row section-head">

   		<div class="twelve columns">

	         <?php 
           if($_SESSION['username']=='admin'){
            echo "<h1 class='edit_area' id='downloadAppTitle'>";
            $text->fetchText("downloadAppTitle", $_SESSION['lang']);
            echo "</h1>";
           } else {
            echo "<h1 id='downloadAppTitle'>";
            $text->fetchText("downloadAppTitle", $_SESSION['lang']);
            echo "</h1>";
           }
            ?>

	         <hr />

	         <?php 
           if($_SESSION['username']== 'admin'){
            echo "<p class='edit_area' id='downloadAppText'>";
            $text->fetchText("downloadAppText", $_SESSION['lang']);
           echo "</p>";
           } else {
            echo "<p id='downloadAppText'>";
            $text->fetchText("downloadAppText", $_SESSION['lang']);
            echo "</p>";
          }
         ?>

	      </div>

        <div class="row">
          <div class="six columns mob-whole"> 
            <!--acordarse, acá hay 2 textos con 1 solo id!!-->
            <p id='link1'>Click <a target='_blank' href=<?php echo '"'.read().'"'; ?> id='link2'><?php echo $lang['link2']; ?></a> <?php echo $lang['link1']; ?></p>
            <a href=<?php echo '"'.read().'"'; ?> target="_blank"><img src="../img/download.png" id="downloadButton" width="150" height="150"></a>
            <?php  
            if($_SESSION['username'] == 'admin'){
            echo "<form id='link_frm' method='post' action='link_modify.php' enctype='application/x-www-form-urlencoded'>
              <fieldset>
              <label id='ch_link'>".$lang['ch_link']."</label>
              <input type='text' placeholder='".$lang['ch_plc']."' size='70px' name='link_txt' id='ch_plc'>
              <input type='submit' value='".$lang['up_link']."' id='up_link'>
              </fieldset>
            </form>";
            }
            ?>
          </div>
          <div class="six columns mob-whole"> 
            <p id='qr_txt'><?php echo $lang['qr_txt']; ?></p> 
            <img src="../img/qrcode.png" id="qrcode" width="150" height="150">
            <?php  
            if($_SESSION['username'] == 'admin'){
            echo "<form id='qr_frm' action='upload_qr.php' method='post' enctype='multipart/form-data'>
            <p id='up_qr'>".$lang['up_qr']."</p>
            <input type='file' name='qrcode' id='qrcode' value='Browse...'>
            <input type='submit' value='".$lang['up_qr_btn']."' id='up_qr_btn'>
          </form>";
        }
        ?>

          </div>
        </div>
            
      </div>

      <br /><br /><br /><br /><br /><br />

     

   </section> <!-- /about -->

   
   <!-- Register Section
   ================================================== -->

  <?php 
    if(!$_SESSION['active']){
      echo "<section id='contact'>

    <div class='row section-head'>

      <div class='twelve columns'>

           <h1 id='register_1'>".$lang['register_1']."</h1>

           <hr />

        </div>

      </div>

      <div class='row form-section'>
        
        <div id='contact-form' class='twelve columns'>

            <form class='form-signin' role='form' method ='post' action ='new_user.php' name ='datos_usu_form' id='form_datos' enctype='application/x-www-form-urlencoded'>

            <fieldset>

                  <div class='row'>

                    <div class='six columns mob-whole'>
                      <input type='text' id='inputUsuReg' class='form-control' placeholder='".$lang['inputUsuReg']."' required name='user'>
                      <span id='usn_null'></span>";
                      
                        if(isset($_GET['error']) && $_GET["error"] == "si") {
                          echo "<script type='text/javascript'>alert('".$lang['us_1']."');</script>";
                          //echo "<span id='us_1'>This username already exists.</span>";
                        }
                       
                   echo "</div>

                    <div class='six columns mob-whole'> 
                       <input type='email' id='inputMail' class='form-control' placeholder='E-Mail' required name='user_mail'>
                       <span id='mail_null'></span>               
                    </div>                          

                  </div>

                  <div class='row'>

                    <div class='six columns mob-whole'> 
                      <input type='password' id='inputPasswordReg' class='form-control' placeholder='".$lang['inputPasswordReg']."' required name='pass'>
                      <span id='pass_null'></span>              
                    </div>

                    <div class='six columns mob-whole'>  
                      <input type='password' id='inputPassword2' class='form-control' placeholder='".$lang['inputPassword2']."' required name='pass2' onblur='verifPass();'>
                      <span id='contraMal'></span>                  
                    </div>

                  </div>

                  <div class='row'>

                       <div class='six columns mob-whole'> 
                       <input type='text' id='inputNombre' class='form-control' placeholder='".$lang['inputNombre']."' required name='user_name'>
                       <span id='name_null'></span>
                       </div>

                       <div class='six columns mob-whole'> 
                        <input type='text' id='inputApellido' class='form-control' placeholder='".$lang['inputApellido']."' required name='user_surname'>
                        <span id='sur_null'></span>
                       </div>

                  </div>

            </fieldset>

            <div id='dialog-6'>
              <p id='terms_ttl'>".$lang['terms_ttl']."</p>
              <p id='terms_txt'>".$lang['terms_txt']."</p>
          </div>
              
          </form>
          <button id='opener-5' class='submit full-width'>".$lang['opener-5']."</button>


         </div>        

      </div>    

   </section>";
    }
  ?> 
  

   <!-- Footer
   ================================================== -->
   <footer>

      <div class="row">       

         <div class="six columns tab-whole footer-about">
				
				<?php 
        if($_SESSION['username']== 'admin'){
          echo "<h3 class='edit_area' id='footer1'>";
          $text->fetchText("footer1", $_SESSION['lang']);
          echo "</h3>";
        } else {
           echo "<h3 id='footer1'>";
           $text->fetchText("footer1", $_SESSION['lang']);
           echo "</h3>";
         }
       ?>
               
            <?php 
            if($_SESSION['username']=='admin'){
              echo "<p class='edit_area' id='footer2'>";
              $text->fetchText("footer2", $_SESSION['lang']);
              echo "</p>";
            } else {
              echo "<p id='footer2'>";
              $text->fetchText("footer2", $_SESSION['lang']);
              echo "</p>";
            }

             ?>

         </div> <!-- /footer-about -->

         <div class="six columns tab-whole right-cols">

            <div class="row">

               <div class="columns">
                  <h3 class="address">Contact Us</h3>
                  <?php
                  if($_SESSION['username']=='admin'){
                    echo "<p class ='edit_area' id='footer3'>";
                    $text->fetchText("footer3", $_SESSION['lang']);
                    echo "</p>";
                  } else{
                    echo "<p id='footer3'>";
                    $text->fetchText("footer3", $_SESSION['lang']);
                    echo "</p>";
                  }
                  ?>

                  <ul>
                    <?php 
                    if($_SESSION['username']=='admin'){
                      echo "<li class='edit_area' id='phone1'>";
                      $text->fetchText("phone1", $_SESSION['lang']);
                      echo "</li>";
                      echo "<li class='edit_area' id='phone2'>";
                      $text->fetchText("phone2", $_SESSION['lang']);
                      echo "</li>";
                      echo "<li class='edit_area' id='mail'>";
                      $text->fetchText("mail", $_SESSION['lang']);
                      echo "</li>";
                    } else {
                      echo "<li id='phone1'>";
                      $text->fetchText("phone1", $_SESSION['lang']);
                      echo "</li>";
                      echo "<li id='phone2'>";
                      $text->fetchText("phone2", $_SESSION['lang']);
                      echo "</li>";
                      echo "<li id='mail'>";
                      $text->fetchText("mail", $_SESSION['lang']);
                      echo "</li>";
                    }
                     ?>
                  </ul>                  
               </div> <!-- /columns -->             


            </div> <!-- /Row(nested) -->

         </div>

         <p class="copyright" style="color: #B2B2B2">&copy; Copyright 2015 eCalving</p>
         <?php/* include_once 'footer.php'; */?>

         <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#hero"><span>Top</span><i class="fa fa-long-arrow-up"></i></a>
         </div>

      </div> <!-- /row -->

   </footer> <!-- /footer -->


   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="../js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="../plugins/puremedia/jquery-migrate-1.2.1.min.js"></script>   
   <script src="../plugins/puremedia/jquery.flexslider.js"></script>
   <script src="../plugins/puremedia/jquery.fittext.js"></script>
   <script src="../plugins/puremedia/backstretch.js"></script> 
   <script src="../plugins/puremedia/waypoints.js"></script>  
   <script src="../plugins/puremedia/main.js"></script>
    <!--JEditable
   ==================================================== -->
  <script src="../js/jeditable.js"></script>
  <script type="text/javascript" src="../js/jeditable_config.js"></script>
  <!--JQueryUI
  ===================================================== -->
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

  <!-- JQueryUI DialogBox Config
  ===================================================== -->
  <?php echo "<script type='text/javascript' src='../js/jqueryUI_dialogbox_config_".$_SESSION['lang'].".js'></script>" ?>
  

  <!-- Verificar que las pass coincidan. 
  ===================================================== -->
  <?php echo "<script type='text/javascript' src='../js/verifPass_".$_SESSION['lang'].".js'></script>" ?>
  
  <!-- Upload script
  ===================================================== -->
  <script type="text/javascript" src='../js/upload_wait.js'></script>
  <!--change pass script
  ===================================================== -->
  <?php echo "<script type='text/javascript' src='../js/change_pass_".$_SESSION['lang'].".js'></script>" ?>
  
 <!--forgot pass script
  ===================================================== -->
  <?php echo "<script type='text/javascript' src='../js/i_forgot_".$_SESSION['lang'].".js'></script>" ?>
  

</body>

</html>