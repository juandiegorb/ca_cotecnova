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
    $NombreUsuario = $mysql->efectuarConsulta("SELECT nombres, apellidos FROM administrador WHERE id_administrador = '".$id_usuario1."'");
    //Este while recorre las filas encontradas en la consulta anterior
    while ($resultado= mysqli_fetch_assoc($NombreUsuario)){
        $nombres= ($resultado["nombres"]);//Guarda el el primer nombre
        $apellidos= ($resultado["apellidos"]);//Guarda el primer apellido
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Adminstrador</title>
        <!-- ALERTIFU STYLES-->
        <link rel="stylesheet" href="css/alertify/alertify.css">
        <link rel="stylesheet" href="css/alertify/bootstrap.css">
        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../assets/css/bootstrap/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../assets/css/bootstrap/timeline.css" rel="stylesheet">
        <!-- TABLE STYLES-->
        <link href="css/dataTables/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="css/dataTables/responsive.dataTables.min.css" rel="stylesheet" />

        <!-- Custom CSS -->
        <link href="../assets/css/bootstrap/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../assets/css/bootstrap/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../assets/css/bootstrap/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Bienvenido, <?php echo $nombres.' '.$apellidos; ?></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-right navbar-top-links">
                <div class="navbar-header">
                    <a id="cerrar_session" class="navbar-brand"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a>
                </div>
                </ul>


                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="#" id="inicio" class="active"><i class="fa fa-home fa-fw"></i> Inicio</a>
                            </li>
                            
                            </li>
                            <li>
                                <a href="#" id="gestionardocente"><i class="fa fa-table fa-fw"></i> Gestionar Docente</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-edit fa-fw"></i> Gestionar Estudiante</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-edit fa-fw"></i> Gestionar Horario</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-edit fa-fw"></i> Gestionar Aula</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-edit fa-fw"></i> Gestionar Materia</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-edit fa-fw"></i> Gestionar Carrera</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

             <!-- PAGE WRAPPER  -->
            <div id="page-wrapper" >
                <!-- PAGE INNER  -->
                <div id="page-inner">                 
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
        <!-- /#wrapper -->

        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="js/jquery/jquery-3.5.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- ALERTIFY STYLES--> 
    <script src="js/alertify/alertify.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <<script src="js/dataTables/jquery.dataTables.min.js"></script>
    <script src="js/dataTables/dataTables.responsive.min.js"></script>
    <!-- JQUERY METIS MENU SCRIPTS -->
    <script src="js/jquery/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->  
    <script src="js/scripts/validacion.js"></script>  
    <script src="js/scripts/funciones.js"></script>
    <script src="js/scripts/index.js"></script> 


    </body>
</html>
