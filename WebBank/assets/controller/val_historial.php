<?php 

if(isset($_POST['cedula']) && isset($_POST['name1']) && isset($_POST['name3']) && isset($_POST['password'])){
    require_once '../model/MySQL.php'; 
    //Encriptada
    $cedula=$_POST['cedula'];
    $name1=$_POST['name1'];
    $name2=$_POST['name2'];
    $name3=$_POST['name3'];
    $name4=$_POST['name4'];  
    $password=$_POST['password'];//Encriptada
    
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    $cedcontra = $mysql->efectuarConsulta("insert into usuario (numero_cedula, contrasena, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido) values('".$cedula."', '".$password."','".$name1."','".$name2."','".$name3."','".$name4."')");   
    if($cedcontra){
        echo "1";
    }else{
        echo "0";
    }
    $mysql->desconectar();   
    
}   
?>