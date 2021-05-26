<?php 
//Validacion de existencia de variables por metodo post
//Esta validacion se realizar para no mostrar errores por no estar declaradas las varibles
if( isset($_POST['cedula']) && isset($_POST['name1']) && 
    isset($_POST['name3']) && isset($_POST['password'])){
    //Archivo requerido para hacer las peticiones a la base de datos
    require_once '../model/MySQL.php';
    //Las siguientes variables han sido encriptadas desde el lado del cliente
    //La encriptacion es base64
    $cedula=$_POST['cedula'];//Encriptada
    $name1=$_POST['name1'];//Encriptada
    $name3=$_POST['name3'];//Encriptada 
    $password=$_POST['password'];//Encriptada
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    //ejecucion de la consulta a la base de datos
    $val_cedula = $mysql->efectuarConsulta("SELECT numero_cedula from usuario where numero_cedula = '".$cedula."'");
    if(mysqli_num_rows($val_cedula) > 0){
        echo "2";//Consulta realizada con exito, se encontro una cedula repetida
        $mysql->desconectar();  
    }else{
        if (isset($_POST['name2']) && isset($_POST['name4'])) {
            $name2=$_POST['name2'];//Encriptada
            $name4=$_POST['name4'];//Encriptada
            //ejecucion de la consulta a la base de datos
            $cedcontra = $mysql->efectuarConsulta("insert into usuario (numero_cedula, contrasena, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, saldo) values('".$cedula."', '".$password."','".$name1."','".$name2."','".$name3."','".$name4."', '1000')");
        }else{
            if (isset($_POST['name2'])) {
                $name2=$_POST['name2'];//Encriptada
                //ejecucion de la consulta a la base de datos
                $cedcontra = $mysql->efectuarConsulta("insert into usuario (numero_cedula, contrasena, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, saldo) values('".$cedula."', '".$password."','".$name1."','".$name2."','".$name3."', NULL, '1000')");
            }else{
                if (isset($_POST['name4'])) {
                    $name4=$_POST['name4'];//Encriptada
                    //ejecucion de la consulta a la base de datos
                    $cedcontra = $mysql->efectuarConsulta("insert into usuario (numero_cedula, contrasena, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, saldo) values('".$cedula."', '".$password."','".$name1."', NULL,'".$name3."','".$name4."', '1000')");
                }else{
                    //ejecucion de la consulta a la base de datos
                    $cedcontra = $mysql->efectuarConsulta("insert into usuario (numero_cedula, contrasena, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, saldo) values('".$cedula."', '".$password."','".$name1."', NULL,'".$name3."', NULL, '1000')");

                }
            }
        }
        //Se valida si la consulta arrojo algun valor
        if($cedcontra){
            echo "1";//Consulta realizada con exito
        }else{
            echo "0";//No se pudo relalizar la consulta
        }
        $mysql->desconectar();  
    }
    

    
     
    
}   
?>
