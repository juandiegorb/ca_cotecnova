<?php
session_start();
if(isset($_POST['cerrar_session']) && $_POST['cerrar_session'] == '1'){//Se valida si existe la varible de cerrar sesion, esta se envia cuando se cierra sesion en algun perfil abierto
    session_unset();    
    session_destroy(); // Destroy the session
}
if(isset($_SESSION['id'])){
         header("location: assets/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <link
      href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="assets/css/alertify/alertify.css">
    <link rel="stylesheet" href="assets/css/login.css" />
  </head>
  <body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img
                src="assets/img/logo_cotecnova.png"
                alt="login"
                class="login-card-img"
              />
            </div>
            <div class="col-md-7"><center>
              <div class="card-body">
                <p class="login-card-description">Sistema de Login</p>
                <form>
                  <div class="form-group">
                    <label for="documento" class="sr-only">documento</label>
                    <input type="text" name="documento"id="documento" class="form-control" placeholder="Documento"
                    />
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="clave" class="form-control" placeholder="***********"/>
                  </div>
                  <div class="form-group">
                    <label>Tipo de usuario: </label>
                    <select id="tipousuario" name="tipo_usuario_login">
                      <option value="1">Estudiante</option>
                      <option value="2">Docente</option>
                      <option value="3">Administrador</option>
                    </select>
                  </div>
                  <input name="login" id="ingresar" class="btn btn-block login-btn mb-4"
                    type="button" value="Ingresar"/>
                </form>
                <a href="#!" class="forgot-password-link"
                  >¿Has olvidado tu contraseña o aun no la tienes?</a
                >
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
              </div>
            </div></center>
          </div>
        </div>
      </div>
    </main>
    <script src="assets/js/jquery/jquery-3.5.1.js"></script>  
    <!-- ALERTIFY SCRIPTS -->
    <script src="assets/js/alertify/alertify.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/scripts/validacion.js"></script>
    <script src="assets/js/scripts/funciones.js"></script>
     
  </body>
</html>
