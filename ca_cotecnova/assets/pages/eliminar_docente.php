<?php
    session_start();//Inicio de sesion
    $id_usuario1 = $_SESSION['id'];//Id del usuario actual
    //Validacion para comprobar si ya se ha iniciado sesion
    //Esto sirve para no permitir navegar entre paginas sin haberse logueado
    if(!isset($_SESSION['id'])){
        //no permite que se entre a las demas vistas por medio de la url
        header("location: ../index.php");
    }
    $id = $_GET["id"];    
    require_once '../model/MySQL.php'; 
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Conexion a la base de datos
    $consulta = $mysql->efectuarConsulta("SELECT id_docente, estado FROM docente WHERE id_docente = ".$id."");
    while ($resultado= mysqli_fetch_assoc($consulta)){      
        $id_docente = $resultado['id_docente'];
        $estado = $resultado['estado'];
    }
?>

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
                          <label hidden="" class="col-md-3">id</label>
                            <div class="col-md-8">
                                <input type="hidden"  id="id"  value="<?php echo $id_docente; ?>" class="form-control form-control-line" >
                            </div>
                        </div>   
                        <div class="form-group">
                          <label hidden="" class="col-md-3">estado</label>
                            <div class="col-md-8">
                                <input type="hidden"  id="estado"  value="<?php echo $estado; ?>" class="form-control form-control-line" >
                            </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-md-offset-2 col-md-12">¿Esta seguro de eliminar al usuario con el documento?</label>
                        </div> 
                  </div>           
                      <div class="form-group">
                    <div class=" col-md-offset-1 col-md-6 ">
                         <!-- Boton que "enviara" los datos -->
                         <button class="btn btn-success" onclick="eliminarDocente()">Eliminar</button>
                    </div>
                    <div class="col-md-3 col-md-6">
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
<script src="../assets/js/jquery/jquery-3.4.1.min.js"></script>
<script src="../assets/js/jquery/jquery.dataTables.min.js"></script>

<script>
$(document).ready( function () {
    $('#ver_docente').DataTable();
} );
</script>