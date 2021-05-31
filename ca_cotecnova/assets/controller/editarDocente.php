<?php
if( isset($_POST['id']) && isset($_POST['documento']) && isset($_POST['nombres']) && 
    isset($_POST['apellidos']) && isset($_POST['clave'])){
    //Archivo requerido para hacer las peticiones a la base de datos
    require_once '../model/MySQL.php';
    
    $id=$_POST['id'];//Encriptada
    $documento=$_POST['documento'];//Encriptada
    $nombres=$_POST['nombres'];//Encriptada
    $apellidos=$_POST['apellidos'];//Encriptada 
    $clave=$_POST['clave'];//Encriptada
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    //ejecucion de la consulta a la base de datos
    $editardocente = $mysql->efectuarConsulta("UPDATE docente SET documento='".$documento."',nombres='".$nombres."',apellidos='".$apellidos."',clave='".$clave."' WHERE id_docente = ".$id."");
    //Se valida si la consulta arrojo algun valor
    if($editardocente){
        echo "1";//Consulta realizada con exito
    }else{
        echo "0";//No se pudo realizar la consulta
    }
    $mysql->desconectar();   
} else {
    echo "0";
}
?>