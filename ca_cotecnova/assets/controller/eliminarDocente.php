<?php
if( isset($_POST['id']) && isset($_POST['estado'])){
    //Archivo requerido para hacer las peticiones a la base de datos
    require_once '../model/MySQL.php';
    
    $id=$_POST['id'];//Encriptada
    $estado=$_POST['estado'];//Encriptada
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    //ejecucion de la consulta a la base de datos
    $eliminardocente = $mysql->efectuarConsulta("UPDATE docente SET estado = 0 WHERE id_docente = ".$id."");
    //Se valida si la consulta arrojo algun valor
    if($eliminardocente){
        echo "1";//Consulta realizada con exito
    }else{
        echo "0";//No se pudo realizar la consulta
    }
    $mysql->desconectar();   
} else {
    echo "0";
}
?>