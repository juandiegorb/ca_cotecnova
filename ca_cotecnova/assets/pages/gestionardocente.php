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
    $consulta = $mysql->efectuarConsulta("SELECT id_docente, documento, nombres, apellidos FROM docente WHERE estado = 1");
    //Este while recorre las filas encontradas en la consulta anterior
?>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/datatables/jquery.dataTables.min.css">
</head>

<!-- /. ROW  -->
<div class="row">
  	<div class="col-md-12 col-sm-12">
            <a class="btn btn-primary" onclick="crear_docente()" style="float: right;" name="enviar">Agregar</a>
		<br><br>
		    <div class="panel panel-default">
		      <div class="panel-body">
		        <div class="tab-content">
		          <div class="tab-pane fade active in" id="gestionardocente">
		          	<table class="table table-hover" id="ver_docente">
			            <thead>
			              <tr>
			                <th scope="col">Numero documento</th>
			                <th scope="col">Nombre completo</th>
			                <th scope="col">Apellidos</th>
			                <th scope="col">Menu</th>
			              </tr>
			            </thead>
			            <tbody>
			             <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
			            <?php
			            while ($resultado= mysqli_fetch_assoc($consulta)){      
					        $id_docente = $resultado['id_docente'];
					    ?>
			              <tr>
			                   <!-- Se traen los datos y se imprimen en las opciones del select -->
			                <td><?php echo $resultado['documento'] ?></td>
			                <td><?php echo $resultado['nombres'] ?></th>
			                <td><?php echo $resultado['apellidos'] ?></td>
			                <td>
			                    <a href="editar_usuario.php?id=<?php echo $id_docente; ?>" class="btn btn-success col-lg-5" name="enviar">Editar</a>   
			                    <!-- Boton que redirecciona al index -->
			                    <a href="eliminar_usuario.php?id=<?php echo $id_docente; ?>" class="btn btn-danger col-lg-offset-1 col-lg-6 " name="eliminar">Eliminar</a>
			                </td>
			              </tr>
			            <?php
			              }
			            ?>
			            </tbody>
			        </table>

		          </div>
		        </div>
		      </div>
		    </div>
  	</div>
</div>
      <!-- /. ROW  -->
<script src="../assets/js/jquery/jquery-3.4.1.min.js"></script>
<script src="../assets/js/jquery/jquery.dataTables.min.js"></script>

<script>
$(document).ready( function () {
    $('#ver_docente').DataTable();
} );
</script>