<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.png" />
    <title>Login </title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" method ="post" action="login.php">
        <div class="logo">
        </div>
        <h2 class="form-signin-heading">Iniciar Sesión</h2>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Nombre de usuario" required autofocus name="user">
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="pass">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
        <br />
        <a href="newUserForm.php">Registrar Nuevo Usuario</a>
        
      </form>
    </div> 
  </body>
</html>