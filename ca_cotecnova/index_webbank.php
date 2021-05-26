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
<html lang="es">
<head>
        <!--|incio del icono que se ve en la pestaña del navegador|-->
        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="assets/img/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!--|fin del icono que se ve en la pestaña del navegador|-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesion - WEBBANK</title>
	<!-- ALERTIFY STYLES-->
  <link rel="stylesheet" href="assets/css/alertify/alertify.css">
  <link rel="stylesheet" href="assets/css/alertify/bootstrap.css">
	<!-- MY STYLES-->
  <link rel="stylesheet" href="assets/css/styles/login.css">
</head>
<body>
  <!-- FORM-->
  <div class="form">
    <h2>INICIO DE SESION <br> WEB BANK</h2>
    <div class="input">
      <div class="inputBox">
        <label for="User">Cedula</label>
        <input  type="text" id="cedula" placeholder="Cedula">
      </div>
      <div class="inputBox">
        <label for="User">Contrase&ntilde;a</label>
        <input type="password" id="pass" placeholder="*******">
      </div>
      <div class="inputBox">
        <input type="button" id="ingresar" value="Ingresar">
      </div>      
    </div>
    <p class="recuperar"><a href="register.php">Registrarme</a></p>
  </div>
  <!-- /. FORM-->
  
  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery/jquery-3.5.1.js"></script>  
  <!-- ALERTIFY SCRIPTS -->
  <script src="assets/js/alertify/alertify.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="assets/js/scripts/validacion.js"></script>
  <script src="assets/js/scripts/funciones.js"></script>
  
</body>
</html>