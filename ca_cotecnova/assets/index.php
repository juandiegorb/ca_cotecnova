<?php
    session_start();//Inicio de sesion
    $id_usuario1 = $_SESSION['id'];//Id del usuario actual
    //Validacion para comprobar si ya se ha iniciado sesion
    //Esto sirve para no permitir navegar entre paginas sin haberse logueado
    if(!isset($_SESSION['id'])){
        //no permite que se entre a las demas vistas por medio de la url
        header("location: ../index.php");
    }
    require_once 'model/MySQL.php'; 
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Conexion a la base de datos
    $NombreUsuario = $mysql->efectuarConsulta("SELECT primer_nombre, primer_apellido FROM usuario WHERE id_usuario = '".$id_usuario1."'");
    //Este while recorre las filas encontradas en la consulta anterior
    while ($resultado= mysqli_fetch_assoc($NombreUsuario)){
        $nombre= base64_decode($resultado["primer_nombre"]);//Guarda el el primer nombre
        $apellido= base64_decode($resultado["primer_apellido"]);//Guarda el primer apellido
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <!--|incio del icono que se ve en la pestaña del navegador|-->
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--|fin del icono que se ve en la pestaña del navegador|-->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WEB BANK</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <!-- ALERTIFU STYLES-->
    <link rel="stylesheet" href="css/alertify/alertify.css">
    <link rel="stylesheet" href="css/alertify/bootstrap.css">
    <!-- TABLE STYLES-->
    <link href="css/dataTables/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="css/dataTables/responsive.dataTables.min.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="css/styles/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
</head>
<body>
    <!-- WRAPPER  -->
    <div id="wrapper">
        <!-- FIXME: NAV TOP - MENU SUPERIOR -->
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <!-- FIXME: LINEAS DIAGONALES - Estas se muestran cuando la escala de la pantalla supera su tamaño minimo, sirven para expandir y contraer el menu -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Web Bank</a> 
            </div>
            <!-- FIXME: /. LINEAS DIAGONALES - Estas se muestran cuando la escala de la pantalla supera su tamaño minimo, sirven para expandir y contraer el menu -->
            <!-- FIXME: Cerrar sesion -->
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
                <a id="cerrar_session" class="btn btn-danger square-btn-adjust">Cerrar Sesi&oacute;n</a> 
            </div>
            <!-- FIXME: /. Cerrar sesion -->
        </nav>   
        <!-- FIXME: /. NAV TOP - MENU SUPERIOR -->

        <!-- TODO: NAV SIDE - MENU LATERAL IZQUIERDO -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <!-- Logo usuario  -->
                    <li class="text-center">
                        <img src="img/logo.png" class="user-image img-responsive"/>
                    </li>
                    <!-- /. Logo usuario  -->      
                    <!--los botones funcionan gracias al index.js - este se encarga que dependiendo del id que
                    tenga el boton haga su respectiva funcion, en este caso es la redireccion a la pagina correspondiente-->             
                    <li>
                        <a href="#" id="transferir"><i class="fa fa fa-arrow-circle-up fa-3x"></i>Transferir</a>
                    </li>
                        <li>
                        <a href="#" id="depositar"><i class="fa fa fa fa-cloud-download fa-3x"></i>Depositar</a>
                    </li>
                    <li>
                        <a href="#" id="retirar"><i class="fa fa fa-cloud-upload fa-3x"></i>Retirar</a>
                    </li>
                    <li >
                        <a href="#" id="consultar"><i class="fa fa-edit fa-3x"></i> Consultar</a>
                    </li>
                    <li  >
                        <a href="#" id="historial"><i class="fa fa-table fa-3x"></i>Historial</a>
                    </li>                                 
                     
                </ul>
            </div> 
        </nav>  
        <!-- TODO: /. NAV SIDE - MENU LATERAL IZQUIERDO  -->
        
        <!-- PAGE WRAPPER  -->
        <div id="page-wrapper" >
            <!-- PAGE INNER  -->
            <div id="page-inner">
                <!-- ROW -->
                <div class="row">
                    <div class="col-md-12">
                     <!--<h2>WEB BANK</h2>-->   
                        <h4>Bienvenido <?php echo $nombre.' '.$apellido; ?> , disfruta de tu estadia. </h4>
                    </div>
                </div>              
                <hr />
                <!-- /. ROW -->
                <div id="view">
                    <!-- View: Aqui se va a cargar las paginas  -->
                </div> 
                <!-- /. ROW -->         
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <footer class="pt-4 my-md-5 pt-md-5 border-top color">
        <center>
            <div class="row">
            <div class="col-12 col-md">
                <!-- <img class="mb-2" src="brand/bootstrap-solid.svg" alt="" width="24" height="24">  -->
                <small class="d-block mb-3 text-muted">&copy; Web Bank. Derechos reservados - 2020</small>
            </div>
          </div>
        </center>
    </footer>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="js/jquery/jquery-3.5.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- ALERTIFY STYLES--> 
    <script src="js/alertify/alertify.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="js/dataTables/jquery.dataTables.min.js"></script>
    <script src="js/dataTables/dataTables.responsive.min.js"></script>
    <!-- JQUERY METIS MENU SCRIPTS -->
    <script src="js/jquery/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->  
    <script src="js/scripts/validacion.js"></script>  
    <script src="js/scripts/funciones.js"></script>
    <script src="js/scripts/index.js"></script> 
</body>
</html>