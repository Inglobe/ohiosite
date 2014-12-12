<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New User Register </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--hojas de estilo-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/higlight.dark.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    
    <!--librerias js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="jquery.confirm.min.js"></script>
    <script src="js/jquery.confirm.js"></script>


    <script type="text/javascript">
   //function terminos(){
  $(".confirm").click({
    text: "Are you sure you want to delete that comment?",
    title: "Confirmation required",
    confirm: function(button) {
        delete();
    },
    cancel: function(button) {
        // nothing to do
    },
    confirmButton: "Yes I am",
    cancelButton: "No",
    post: true,
    confirmButtonClass: "btn-danger"
});
   //}
    </script>

        
    <script>
    function verifPass(){
      
    }
    </script>
    
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" method ="post" action = "newUser.php">
        <h2 class="form-signin-heading">Registrar Nuevo Usuario</h2>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <?php 
          if(isset($_GET["error"]) && $_GET["error"] == "si") {
            echo "<span>El nombre de usuario ya existe</span>";
          }
         ?>
        <input type="text" id="inputUsu" class="form-control" placeholder="Nombre de usuario" required autofocus name="user">
        <label id="veriUsua"></label>
        <label for="inputEmail" class="sr-only">Nombre </label>
        <input type="text" id="inputNombre" class="form-control" placeholder="Nombre" required autofocus name="user_name">
        <input type="text" id="inputApellido" class="form-control" placeholder="Apellido" required autofocus name="user_surname">
        <input type="email" id="inputEmail" class="form-control" placeholder="E-Mail" required autofocus name="user_mail">
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <?php 
          if(isset($_GET["passError"]) && $_GET["passError"] == "si") {
            echo "<span>Las contraseñas no coinciden.</span>";
          }
         ?>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="pass">
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Verif. Contraseña" required name="pass2" onkeypress ="verifPass()">
        <button class="confirm" id="complexConfirm" type="submit">Registrar</button>
      </form>
    </div> 
  </body>
</html>