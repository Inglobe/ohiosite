<?php 
include_once 'fetch_texts.php';
$text = new fetch_texts();
session_start();
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
	<title>Calvin App</title>
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
        #hero {
          height: 650px;
          max-height: 650px;
        }
        #flex-caption {
          width: 200px;
        }
    </style>

</head>

<body class="homepage">

   <div id="preloader"> 
	   <div id="status">
         <img src="../img/loader.gif" height="60" width="60" alt="">
         <div class="loader">Loading...</div>
      </div>
   </div>
   

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
              <li><?php if($_SESSION['active']){
                echo "<a class='smoothscroll' href='#SignIn'>My Profile</a>";
              } else echo "<a class='smoothscroll' href='#SignIn' id='loginLogout'>Sign In</a>"; ?></li>
		          <li><a class="smoothscroll" href="#portfolio">About the app</a></li>
	            <li><a class="smoothscroll" href="#services">How to use it</a></li>
	            <li><a class="smoothscroll" href="#about">Download</a></li>
              <?php 
                if(!$_SESSION['active']){
                  echo "<li><a class='smoothscroll' href='#contact'>Create an account</a></li>";
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
                  $text->fetchText("slide1");
                  echo "</h1>"; 
                } else {
                  echo "<h1 id='slide1'>";
                  $text->fetchText("slide1");
                  echo "</h1>";
                }
                 ?>
								<p><a class="button stroke smoothscroll" href="#about">More About Us</a></p>																   
							</div>						
					   </li>

					   <!-- Slide -->
					   <li>						
							<div class="flex-caption">
								<?php
                if ($_SESSION['username']=='admin'){
                  echo "<h1 class='edit_area' id='slide2'>";
                  $text->fetchText("slide2");
                  echo "</h1>"; 
                } else {
                  echo "<h1 id='slide2'>";
                  $text->fetchText("slide2");
                  echo "</h1>";
                }
                 ?>
								<p><a class="button stroke smoothscroll" href="#portfolio">See Our Works</a></p>									   
							</div>					
					   </li>

					   <!-- Slide -->
					   <li>
						   <div class="flex-caption">
								<?php
                if ($_SESSION['username']=='admin'){
                  echo "<h1 class='edit_area' id='slide3'>" ;
                  $text->fetchText("slide3");
                  echo "</h1>"; 
                } else {
                  echo "<h1 id='slide3'>";
                  $text->fetchText("slide3");
                  echo "</h1>";
                }
                 ?>
								<p><a class="button stroke smoothscroll" href="#contact">Get In Touch</a></p>										   
							</div>
					   </li>					              

				   </ul>

			   </div> <!-- .flexslider -->				   

	      </div> <!-- .flex-container -->      

		</div> <!-- .hero-content -->	   

   </section> <!-- #hero -->


    <!-- SignIn
   =================================================== -->
    <section id="SignIn">

    <div class="row section-head">

      <div class="twelve columns">

           <?php
           if(!$_SESSION['active']){
            echo "<h1 classid='contactTitle'>Sign In</h1>";
            echo "<hr />";
            echo "     <div class='row form-section'>
        
        <div id='contact-form' class='twelve columns'>

            <div class='row section-head'>
      <div id='contact-form' class='twelve columns'>

        <form role='form' method ='post' action='login.php'  enctype='application/x-www-form-urlencoded'>

          <fieldset>

          <div class='six columns mob-whole'>
            <input type='text' id='inputUsu' class='form-control' placeholder='Nombre de usuario' required name='user'>";

          if($_GET['error']=='si'){
              echo "<span autofocus>Nombre de usuario o contraseña incorrectos</span>";
          }
          echo "</div>
          <div class='six columns mob-whole'>
            <input type='password' id='inputPassword' class='form-control' placeholder='password' required name='pass'>
          </div>
          <div class='six columns mob-whole'>
          <a href='' id='i_forgot'>I forgot my password</a>
          </div>
          <button class='btn btn-lg btn-primary btn-block' type='submit'>Sign In</button>
          <br />

        </fieldset>
        </form>
      </div>";
           } else {
            echo "<h1 classid='contactTitle'>Welcome ".$_SESSION['username'] ."!</h1>";
            echo "<hr />";
            echo "<p>Your rodeo is: ".$_SESSION['rodeo']."</p>";
            echo "<a href='registers.php'><button>Manage Account</button><a>";
            echo "<button class='btn btn-lg btn-primary btn-block' type='submit' id='change_pass'>Change password</button>";
            echo "<a href='logout.php'><button>Logout</button><a>";
            }
            ?>

        </div>
      </div>
<?php 
if(isset($_GET['chg']) && $_GET['chg']=='ok'){
  echo "<script type='text/javascript'>
  alert('Password successfully changed!');
  </script>";
} elseif (isset($_GET['chg']) && $_GET['chg']=='no#SignIn') {
  echo "<script type='text/javascript'>
  alert('The passwords don't match');
  </script>";
}
  

 ?>
 
    </div> 
  <div id="dialog-form" title="Change Password">
  <p class="validateTips">All form fields are required.</p>
 
  <form id="change_pass_frm" method='post' action='change_pass.php' enctype='application/x-www-form-urlencoded'>
    <fieldset>
      <label for="name">Old Password</label>
      <input type="password" name="old_pass" id="old_pass" placeholder="xxxxxxx" class="text ui-widget-content ui-corner-all">
      <span id="span_old_pass"></span>
      <label for="email">New Password</label>
      <input type="password" name="new_pass1" id="new_pass1" placeholder="xxxxxxx" class="text ui-widget-content ui-corner-all">
      <span id="span_new_pass1"></span>
      <label for="password">Repeat New Password</label>
      <input type="password" name="new_pass2" id="new_pass2" placeholder="xxxxxxx" class="text ui-widget-content ui-corner-all">
      <span id="span_new_pass2"></span>
      <?php echo "<input type='text' id='user' name='user' value='".$_SESSION['username']."' style='visibility:hidden; display:none;'>"; ?>
      
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form" title="Forgot Password">
  <p class="validateTips">Please enter your username and the email you registered with. A new password will be sent to your email.</p>
 
  <form id="i_forgot_frm" method='post' action='forgot_pass.php' enctype='application/x-www-form-urlencoded'>
    <fieldset>
      <label>Username</label>
      <input type='text' name='user' placeholder='user' id='name' class='text ui-widget-content ui-corner-all'>
      <span id="name_spn"></span>
      <label for="name">Email Adress</label>
      <input type="text" name="mail" id="mail" placeholder="example@example.com" class="text ui-widget-content ui-corner-all">
      <span id="mail_spn"></span>
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

   </section> <!-- /blog -->


   <!-- About the app
   ================================================== -->
   <section id="portfolio">

      <div class="row section-head">

      	<div class="twelve columns">

	         <?php 

           if($_SESSION['username']=='admin'){
            echo "<h1 class='edit_area' id='aboutTitle'>";
            $text->fetchText("aboutTitle");
            echo "</h1>";
            echo "<hr />";
            echo "<p class='edit_area' id='aboutText'>";
            $text->fetchText("aboutText");
            echo "</p>";
           } else {
            echo "<h1 id='aboutTitle'>";
            $text->fetchText("aboutTitle");
            echo "</h1>";
            echo "<hr />";
            echo "<p id='aboutText'>";
            $text->fetchText("aboutText");
            echo "</p>";
           }

          ?>

	      </div>

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
            $text->fetchText("howToUseTitle");
            echo "</h1>";
           } else {
            echo "<h1 id='howToUseTitle'>";
            $text->fetchText("howToUseTitle");
            echo "</h1>";
           }
            ?>

	         <hr />

	         <?php 
           if ($_SESSION['username']=='admin'){
            echo "<p class='edit_area' id='howToUseText'>";
            $text->fetchText("howToUseText");
            echo "</p>";
           } else {
            echo "<p id='howToUseText'>";
            $text->fetchText("howToUseText");
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
                    
                <h3><a href='../pdf instructions file/instructions.pdf'>Download instructions (PDF File)</a></h3>
            </div> <!--mob-whole-->

            <div class='twelve columns mob-whole'> 
                <div class='icon-part'>
                  <i class='icon-cloud-upload'></i>                 
                </div>
                    
                <h3>Upload the PDF File (ADMIN ONLY)</h3>
                <form action='upload.php' method='post' id='form' enctype='multipart/form-data'>
                  <fieldset>
                    <input type='file' id='pdffile' name='pdffile'>
                    <button id='uploadPdf_btn' type='submit' style='visibility:visible;'>Upload</button>
                  </fieldset>
                  
                  <span id='upload_status_txt' style='visibility:hiden; display:none;'></span>";
                  if(isset($_GET['upstatus']) && $_GET['upstatus']=='err'){
                    echo "<span id='upload_status_txt'>Only PDF files allowed! Please check the file extension.</span>";
                  } elseif (isset($_GET['upstatus']) && $_GET['upstatus']=='ok') {
                    echo "<span id='upload_status_txt'>File successfully uploaded!</span>";
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
                    
                 <h3><a href=''>Download instructions (PDF File)</a></h3>


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
            $text->fetchText("downloadAppTitle");
            echo "</h1>";
           } else {
            echo "<h1 id='downloadAppTitle'>";
            $text->fetchText("downloadAppTitle");
            echo "</h1>";
           }
            ?>

	         <hr />

	         <?php 
           if($_SESSION['username']== 'admin'){
            echo "<p class='edit_area' id='downloadAppText'>";
            $text->fetchText("downloadAppText");
           echo "</p>";
           } else {
            echo "<p id='downloadAppText'>";
            $text->fetchText("downloadAppText");
            echo "</p>";
          }
         ?>

	      </div>

        <div class="row">
          <div class="six columns mob-whole"> 
            <p>Click <a href="https://build.phonegap.com/apps/1146542/share">here</a> or the icon to download the app!</p>
            <a href="https://build.phonegap.com/apps/1146542/share"><img src="../img/download.png" id="downloadButton" width="150" height="150"></a>
          </div>
          <div class="six columns mob-whole"> 
            <p>Or scan the QR Code below: </p> 
            <img src="../img/qrcode.png" id="qrcode" width="150" height="150">
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

           <h1>Register a new user</h1>

           <hr />

        </div>

      </div>

      <div class='row form-section'>
        
        <div id='contact-form' class='twelve columns'>

            <form class='form-signin' role='form' method ='post' action ='new_user.php' name ='datos_usu_form' id='form_datos' enctype='application/x-www-form-urlencoded'>

            <fieldset>

                  <div class='row'>

                    <div class='six columns mob-whole'>
                      <input type='text' id=inputUsu' class='form-control' placeholder='Nombre de usuario*'' required name='user' onblur='verificar( #id);'>
                      <span id='usn_null'></span>";
                      
                        if(isset($_GET["error"]) && $_GET["error"] == "si") {
                          echo "<span>El nombre de usuario ya existe</span>";
                        }
                       
                   echo "</div>

                    <div class='six columns mob-whole'> 
                       <input type='email' id='inputMail' class='form-control' placeholder='E-Mail' required name='user_mail'>
                       <span id='mail_null'></span>               
                    </div>                          

                  </div>

                  <div class='row'>

                    <div class='six columns mob-whole'> 
                      <input type='password' id='inputPassword' class='form-control' placeholder='Contraseña' required name='pass'>
                      <span id='pass_null'></span>              
                    </div>

                    <div class='six columns mob-whole'>  
                      <input type='password' id='inputPassword2' class='form-control' placeholder='Verif. Contraseña' required name='pass2' onblur='verifPass();'>
                      <span id='contraMal'></span>                  
                    </div>

                  </div>

                  <div class='row'>

                       <div class='six columns mob-whole'> 
                       <input type='text' id='inputNombre' class='form-control' placeholder='Nombre' required name='user_name'>
                       <span id='name_null'></span>
                       </div>

                       <div class='six columns mob-whole'> 
                        <input type='text' id='inputApellido' class='form-control' placeholder='Apellido' required name='user_surname'>
                        <span id='sur_null'></span>
                       </div>

                  </div>

            </fieldset>

            <div id='dialog-6'>
              <p>You must accept these terms before continuing.</p>
              <p>This Agreement and the Request constitute the entire agreement of the 
              parties with respect to the subject matter of the Request. This Agreement shall be 
              governed by and construed in accordance with the laws of the State, without giving 
              effect to principles of conflicts of law.</p>
          </div>
              
          </form>
          <button id='opener-5' class='submit full-width'>Register New User</button>


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
          $text->fetchText("footer1");
          echo "</h3>";
        } else {
           echo "<h3 id='footer1'>";
           $text->fetchText("footer1");
           echo "</h3>";
         }
       ?>
               
            <?php 
            if($_SESSION['username']=='admin'){
              echo "<p class='edit_area' id='footer2'>";
              $text->fetchText("footer2");
              echo "</p>";
            } else {
              echo "<p id='footer2'>";
              $text->fetchText("footer2");
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
                    $text->fetchText("footer3");
                    echo "</p>";
                  } else{
                    echo "<p id='footer3'>";
                    $text->fetchText("footer3");
                    echo "</p>";
                  }
                  ?>

                  <ul>
                    <?php 
                    if($_SESSION['username']=='admin'){
                      echo "<li class='edit_area' id='phone1'>";
                      $text->fetchText("phone1");
                      echo "</li>";
                      echo "<li class='edit_area' id='phone2'>";
                      $text->fetchText("phone2");
                      echo "</li>";
                      echo "<li class='edit_area' id='mail'>";
                      $text->fetchText("mail");
                      echo "</li>";
                    } else {
                      echo "<li id='phone1'>";
                      $text->fetchText("phone1");
                      echo "</li>";
                      echo "<li id='phone2'>";
                      $text->fetchText("phone2");
                      echo "</li>";
                      echo "<li id='mail'>";
                      $text->fetchText("mail");
                      echo "</li>";
                    }
                     ?>
                  </ul>                  
               </div> <!-- /columns -->             


            </div> <!-- /Row(nested) -->

         </div>

         <p class="copyright" style="color: #B2B2B2">&copy; Copyright 2014 Calvin App</p>        

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
  <script src="http://www.appelsiini.net/projects/jeditable/jquery.jeditable.js"></script>
  <script type="text/javascript" src="../js/jeditable_config.js"></script>
  <!--JQueryUI
  ===================================================== -->
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

  <!-- JQueryUI DialogBox Config
  ===================================================== -->
  <script type="text/javascript" src="../js/jqueryUI_dialogbox_config.js"></script>

  <!-- Verificar que las pass coincidan. 
  ===================================================== -->
  <script type="text/javascript" src="../js/verifPass.js"></script>
  <!-- Upload script
  ===================================================== -->
  <script type="text/javascript" src='../js/upload_wait.js'></script>
  <!--change pass script
  ===================================================== -->
  <script type="text/javascript" src="../js/change_pass.js"></script>
 <!--forgot pass script
  ===================================================== -->
  <script type="text/javascript" src="../js/i_forgot.js"></script>

</body>

</html>