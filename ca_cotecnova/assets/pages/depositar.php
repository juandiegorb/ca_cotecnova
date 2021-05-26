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
    $SaldoUsuario = $mysql->efectuarConsulta("SELECT saldo FROM usuario WHERE id_usuario = '".$id_usuario1."'");
    //Este while recorre las filas encontradas en la consulta anterior
    while ($resultado= mysqli_fetch_assoc($SaldoUsuario)){
        $saldo= $resultado["saldo"];//Guarda el primer apellido
    }
?> 
<div class="col-md-12">
    <!-- Form Elements -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Formulario de Deposito
        </div>
        <div class="panel-body">
            <div class="row">
                    <div class="col-md-12">
                        <h3>Informaci&oacute;n Basica</h3>
                        <p>Fondos actuales: $<?php echo $saldo; ?>.<br>No puedes depositar menos de $1000 ni m&aacute;s de $2000000.</p>
                        <div role="form">
                            <div class="form-group col-md-6">
                                <label>Monto a Depositar</label>
                                <input id="monto1" class="form-control" />
                            </div>
                            <div class="form-group col-md-12">
                                <span class="badge alert-info"> Recuerda ingresar el monto sin puntos ni comas<br>solo el numero</span>
                            </div>
                            <div class="botones">
                                <button onclick="cancelar()" class="btn btn-default pull-md-8">Cancelar</button>
                                <button onclick="submitdepositar()" class="btn btn-primary">Depositar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- End Form Elements -->
</div>