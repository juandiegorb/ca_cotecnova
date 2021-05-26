<?php 

if(isset($_POST['cedula']) && isset($_POST['monto'])){
    require_once '../model/MySQL.php'; 
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//Conexion a la base de datos
    session_start();//Inicio de sesion
    $id_usuario1 = $_SESSION['id'];//Id del usuario actual
    $cedula=$_POST['cedula'];
    $monto=$_POST['monto'];
    //Consulta para saber el saldo del usuario que quiere hacer la transaccion
    $saldoUsuario1 = $mysql->efectuarConsulta("SELECT saldo FROM usuario WHERE id_usuario = '".$id_usuario1."'");
    //Este while recorre las filas encontradas en la consulta anterior
    while ($resultado= mysqli_fetch_assoc($saldoUsuario1)){
        $saldo1= $resultado["saldo"];//Guarda el saldo del usuario 1
    }
    //Consulta para verificar si el usuario a enviar la transferencia existe y extraer el id y el saldo 
    $EncontrarUsuario2 = $mysql->efectuarConsulta("SELECT id_usuario, saldo FROM usuario WHERE numero_cedula = '".$cedula."'");
    //Se valida si el saldo del usuario 1 es mayor igual que el monto que quiera retirar, ademas se valida si el usuario a depositar existe
    if($saldo1 >= $monto && mysqli_num_rows($EncontrarUsuario2) > 0){
        //Este while recorre las filas encontradas en la consulta del usuario2
        while ($resultado= mysqli_fetch_assoc($EncontrarUsuario2)){
            $id_usuario2= $resultado["id_usuario"];//Se obtiene el id del usuario 2
            $saldo2= $resultado["saldo"];//Se obtiene el saldo del usuario 2
        }
        if($id_usuario1 != $id_usuario2){
            date_default_timezone_set('America/Bogota');//Esta funcion sirve para establecer la zona horaria 
            $fecha = date("Y-m-d H:i:s");//Se guarda la fecha y hora actual
            //COnsulta para insertar el valor en el historial
            $historial = $mysql->efectuarConsulta("INSERT INTO historial (id_usuario, id_usuario2, id_transacion, cantidad, fecha) VALUES ('".$id_usuario1."', '".$id_usuario2."', '1', '".$monto."', '".$fecha."')");
            //Resta para guardar el slado que le queda al usuario1
            $restaSaldoUsuario1 = $saldo1 - $monto;//Saldo
            $quitarPlataUsuario1 = $mysql->efectuarConsulta("UPDATE usuario SET saldo= '".$restaSaldoUsuario1."' WHERE id_usuario =  '".$id_usuario1."'");
            $sumaSaldoUsuario2 = $saldo2 + $monto;
            $agregarPlataUsuario2 = $mysql->efectuarConsulta("UPDATE usuario SET saldo= '".$sumaSaldoUsuario2."' WHERE id_usuario =  '".$id_usuario2."'");
            if ($quitarPlataUsuario1 && $agregarPlataUsuario2){ 
                echo '1';
            }else{
                echo '0';//No se pudo realizar la consulta
            }
        }else{
            echo '0';//No se encontro el usuario
        }        
    }else{
        echo '0';//No se encontro el usuario
    }
    $mysql->desconectar();
} 
?>