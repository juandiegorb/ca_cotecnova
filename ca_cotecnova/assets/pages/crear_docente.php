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
                  <form class="form-horizontal form-material" action="Controlador/insertarUsuario.php" method="POST">                
                  <div class="form-group">
                    <label class="col-sm-3">Tipo de documento</label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-line" name="tipoDocumento" required="">
                        <option disabled selected="true">Seleccione una opcion</option>
                        <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                         <?php 
                         while ($resultado= mysqli_fetch_assoc($seleccionDocumento)){   
                             ?> 
                        <!-- Se traen los datos y se imprimen en las opciones del select -->
                          <option value="<?php echo $resultado['id_tipo_documento']?>"><?php echo $resultado['nombre']?></option>  
                          <?php }?>
                      </select>
                    </div>
                  </div>
                  <!-- Divisiones, etiquetas e inputs -->
                  <div class="form-group">
                    <label class="col-sm-12">Numero</label>            
                    <div class="col-md-12">
                        <input type="text" placeholder="Ingrese el numero del documento" name="numeroDocumento" class="form-control form-control-line" required="" onkeypress="return solonumeros(event)">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Nombre Completo</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Ingrese sus nombres" name="nombreCompleto" class="form-control form-control-line" required="" onkeypress="return sololetras(event)">
                    </div>
                  </div>
                  <div class="form-group">                  
                    <label class="col-md-12">Apellidos</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Ingrese sus apellidos" name="apellidos" class="form-control form-control-line" required="" onkeypress="return sololetras(event)">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-12">Estado civil</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="estadoCivil" required="">
                        <option disabled selected="true">Seleccione una opcion</option>
                           <?php 
                           //se recorre el resultado de la consulta de estado civil
                         while ($resultado= mysqli_fetch_assoc($seleccionEstado)){
                             //se imprime los resultados
                             ?> 
                          <option value="<?php echo $resultado['id_estado_civil']?>"><?php echo $resultado['nombre']?></option>  
                          <?php }?>
                      </select>
                    </div>
                  </div>                
                  <div class="form-group">
                    <label class="col-sm-12">Departamento de nacimiento</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" id="departamento" name="departamentoNacimiento" required="">
                        <option disabled selected="true">Seleccione una opcion</option>
                        <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                           <?php 
                           //se recorre los resultado de departamentos
                         while ($resultado= mysqli_fetch_assoc($seleccionDepartamento)){   
                             ?>
                        <!-- Se traen los datos y se imprimen en las opciones del select -->
                          <option value="<?php echo $resultado['id_departamento']?>"><?php echo $resultado['nombre']?></option>  
                          <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-12">Ciudad de nacimiento</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" id="ciudad" name="ciudadNacimiento" disabled required="">
                        <option disabled selected="true">Seleccione una ciudad</option>

                      </select>
                    </div>
                  </div>
                  <!-- Divisiones, etiquetas e inputs -->
                  <div class="form-group">
                    <label class="col-md-12">Contraseña</label>
                    <div class="col-md-12">
                        <input type="password" placeholder="Ingrese una clave" class="form-control form-control-line" name="contrasena" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-3 col-md-2">
                         <!-- Boton que "enviara" los datos -->
                        <button class="btn btn-success" name="enviar">Registrarse</button>
                    </div>
                    <div class="col-sm-9 col-md-4">
                        <!-- Boton que redirecciona al index -->
                      <a href="index.php" class="btn btn-danger">Cancelar</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
      </div>
    </section>
</div>
      <!-- /. ROW  -->
