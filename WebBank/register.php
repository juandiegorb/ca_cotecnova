<?php
  session_start();//Inicio de sesion
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
  <title>Registro - WEBBANK</title>
	<!-- ALERTIFY STYLES-->
  <link rel="stylesheet" href="assets/css/alertify/alertify.css">
  <link rel="stylesheet" href="assets/css/alertify/bootstrap.css">
	<!-- MY STYLES-->
  <link rel="stylesheet" href="assets/css/styles/register.css">
</head>
<body>
  <!-- FORM-->
  <div class="form">
    <h2>Registro <br> WEB BANK </h2>
    <div class="input">
      <div class="inputBox">
        <label for="cedula">Numero de cedula <span>*</span></label>
        <input type="number" id="cedula" placeholder="0123456789">
      </div>
      <div class="inputBox name">
        <label for="name1">Primer nombre <span>*</span></label>
        <input type="text" id="name1">
      </div>
      <div class="inputBox name">
        <label for="name2">Segundo nombre</label>
        <input type="text" id="name2">
      </div>
      <div class="inputBox name">
        <label for="name3">Primer apellido <span>*</span></label>
        <input type="text" id="name3">
      </div>
      <div class="inputBox name">
        <label for="name4">Segundo apellido</label>
        <input type="text" id="name4">
      </div>
      <div class="inputBox">
        <label for="User">Contrase&ntilde;a <span>*</span></label>
        <input type="password" id="pass" placeholder="*******">
      </div>
      <div class="inputBox">
        <label for="User">Repetir contrase&ntilde;a <span>*</span></label>
        <input type="password" id="repetir" placeholder="*******">
      </div>
      <div class="inputBox">
        <input type="button" id="registrar" value="Registrar">
      </div>
    </div>    
    <p class="recuperar">* = campos requeridos</p>
    <p class="recuperar"><a href="index.php">Iniciar sesion</a></p>
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