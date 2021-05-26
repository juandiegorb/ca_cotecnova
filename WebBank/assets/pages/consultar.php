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
    $SaldoUsuario = $mysql->efectuarConsulta("SELECT numero_cedula, saldo FROM usuario WHERE id_usuario = '".$id_usuario1."'");
    //Este while recorre las filas encontradas en la consulta anterior
    while ($resultado= mysqli_fetch_assoc($SaldoUsuario)){
        $cuenta= base64_decode($resultado["numero_cedula"]);//Guarda el el primer nombre
        $saldo= $resultado["saldo"];//Guarda el primer apellido
    }
?>          
<br>
<table class="table">
  <h3 class="text-center">Informaci&oacute;n de la Cuenta</h3>
  <thead>
    <tr>
      <th scope="col">N&uacute;mero de Cuenta</th>
      <th scope="col">Saldo Disponible</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $cuenta; ?></th>
      <td>$ <?php echo $saldo; ?></td>
    </tr>
  </tbody>
</table>
<hr />