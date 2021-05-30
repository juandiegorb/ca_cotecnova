<?php
    session_start();//Inicio de sesion
    $id_usuario1 = $_SESSION['id'];//Id del usuario actual
    //Validacion para comprobar si ya se ha iniciado sesion
    //Esto sirve para no permitir navegar entre paginas sin haberse logueado
    if(!isset($_SESSION['id'])){
        //no permite que se entre a las demas vistas por medio de la url
        header("location: ../index.php");
    }
    require_once '../model/MySQL.php'; 
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Conexion a la base de datos
    
    $seleccionTipoUsuario = $mysql->efectuarConsulta("SELECT id_docente, documento, nombres, apellidos, clave FROM docente WHERE tipo_usuario_id_tipo_usuario = 2");     
    
?>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/datatables/jquery.dataTables.min.css">
</head>

<!-- /. ROW  -->
<div class="row">
  	<section id="service" class="section-padding">
          <div class="col-md-offset-2 col-md-8 col-sm-8">
            <div class="card">
              <!-- Tab panes -->
              <div class="card-body">
                  <!-- Formulario donde al darle al boton se envian los datos al controlador de insertar usuario -->
                  <form class="form-horizontal form-material" method="POST">     
                      <div class="form-group">
                    <label class="col-md-3">Numero Documento</label>
                    <div class="col-md-8">
                        <input type="number"  id="numerodocumento" placeholder="Ingrese el numero del documento" name="numeroDocumento"  class="form-control form-control-line" required="" >
                    </div>
                  </div>                  
                   <div class="form-group">
                    <label class="col-md-3">Nombres</label>
                    <div class="col-md-8">
                        <input type="text" id="nombres" placeholder="Ingrese sus nombres" name="nombresCompleto" class="form-control form-control-line" required="">
                    </div>
                  </div>
                      <div class="form-group">
                    <label class="col-md-3">Apellidos</label>
                    <div class="col-md-8">
                        <input type="text" id="apellidos" placeholder="Ingrese sus apellidos" name="apellidosCompleto" class="form-control form-control-line" required="">
                    </div>
                  </div>
                  <div class="form-group">                  
                    <label class="col-md-3">Clave</label>
                    <div class="col-md-8">
                        <input type="password" id="clave" placeholder="Ingrese su clave" name="clave" class="form-control form-control-line" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3">tipo usuario</label>
                    <div class="col-sm-8">
                        <select id="tipousuario" class="form-control form-control-line" name="tipousuario" disabled="" required="">
                            <option  value="2">Docente</option>
                      </select>
                    </div>
                  </div>           
                      <div class="form-group">
                    <div class=" col-md-offset-7 col-md-2 ">
                         <!-- Boton que "enviara" los datos -->
                         <button class="btn btn-success" onclick="crearDocente()">Registrarse</button>
                    </div>
                    <div class="col-sm-9 col-md-2">
                        <!-- Boton que redirecciona al index -->
                      <a onclick="cancelar()" class="btn btn-danger">Cancelar</a>
                    </div>
                  </div>
                 
                </form>
              </div>
            </div>
      </div>
    </section>
</div>
      <!-- /. ROW  -->
