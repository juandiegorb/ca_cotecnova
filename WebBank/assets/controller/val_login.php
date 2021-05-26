<?php 
if(isset($_POST['cedula']) && isset($_POST['password'])){
    require_once '../model/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables
    $ced=$_POST['cedula'];
    $pass=$_POST['password'];

    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    //ejecucion de consulta
    $cedcontra = $mysql->efectuarConsulta("select id_usuario, primer_nombre, primer_apellido from `usuario` where `numero_cedula` = '".$ced."' AND `contrasena` = '".$pass."'");   
    if(!empty($cedcontra)){
        if (mysqli_num_rows($cedcontra) > 0){ 
            while ($resultado= mysqli_fetch_assoc($cedcontra)){
                $id_usuario= $resultado["id_usuario"];
                $primer_nombre= $resultado["primer_nombre"];
                $primer_apellido= $resultado["primer_apellido"];
            }
            $mysql->desconectar();
            session_start();//Inicio de sesion
            $_SESSION['nombre']=$primer_nombre.' '.$primer_apellido;
            $_SESSION['id']=$id_usuario;
            echo '1';
        }else{
            echo '0';
        }
    }else{
        echo "consultaVacia";
    }  
}
  
?>