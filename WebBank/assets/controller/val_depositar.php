<?php 
    if(isset($_POST['monto'])){
        require_once '../model/MySQL.php'; 
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();//Conexion a la base de datos
        session_start();//Inicio de sesion
        $id_usuario1 = $_SESSION['id'];//Id del usuario actual
        $monto=$_POST['monto'];
        //Consulta para saber el saldo del usuario que quiere hacer la transaccion
        $saldoUsuario1 = $mysql->efectuarConsulta("SELECT saldo FROM usuario WHERE id_usuario = '".$id_usuario1."'");
        //Este while recorre las filas encontradas en la consulta anterior
        while ($resultado= mysqli_fetch_assoc($saldoUsuario1)){
            $saldo1= $resultado["saldo"];//Guarda el saldo del usuario 1
        }
        
        date_default_timezone_set('America/Bogota');//Esta funcion sirve para establecer la zona horaria 
        $fecha = date("Y-m-d H:i:s");//Se guarda la fecha y hora actual
        //COnsulta para insertar el valor en el historial
        $historial = $mysql->efectuarConsulta("INSERT INTO historial (id_usuario, id_usuario2, id_transacion, cantidad, fecha) VALUES ('".$id_usuario1."', NULL, '2', '".$monto."', '".$fecha."')");
        //Resta para guardar el slado que le queda al usuario1
        $sumaSaldoUsuario1 = $saldo1 + $monto;//Saldo
        $agregarPlataUsuario1 = $mysql->efectuarConsulta("UPDATE usuario SET saldo= '".$sumaSaldoUsuario1."' WHERE id_usuario =  '".$id_usuario1."'");
        if ($agregarPlataUsuario1){ 
            echo '1';
        }else{
            echo '0';//No se pudo realizar la consulta
        }      
        
        $mysql->desconectar();
    } 
?>

