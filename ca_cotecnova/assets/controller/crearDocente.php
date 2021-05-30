<?php
if( isset($_POST['documento']) && isset($_POST['nombres']) && 
    isset($_POST['apellidos']) && isset($_POST['clave'])){
    //Archivo requerido para hacer las peticiones a la base de datos
    require_once '../model/MySQL.php';
    
    $documento=$_POST['documento'];//Encriptada
    $nombres=$_POST['nombres'];//Encriptada
    $apellidos=$_POST['apellidos'];//Encriptada 
    $clave=$_POST['clave'];//Encriptada
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    //ejecucion de la consulta a la base de datos
    $creardocente = $mysql->efectuarConsulta("insert into docente(documento, nombres, apellidos, clave, tipo_usuario_id_tipo_usuario, estado) values ('".$documento."', '".$nombres."','".$apellidos."','".$clave."','2','1')");
    //Se valida si la consulta arrojo algun valor
    if($creardocente){
        echo "1";//Consulta realizada con exito
    }else{
        echo "0";//No se pudo realizar la consulta
    }
    $mysql->desconectar();   
}
?>
