<?php 
if(isset($_POST['documento']) && isset($_POST['clave'])&& isset($_POST['tipousuario'])){
    require_once '../model/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables
    $doc=$_POST['documento'];
    $clave=$_POST['clave'];
    $tipousuario=$_POST['tipousuario'];//esto se utiliza para separar los tipos de usuario en las consultas

    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    //ejecucion de consulta
    if($tipousuario == 1){        
        
    }elseif ($tipousuario == 2){    
        
    }elseif($tipousuario == 3){
        $cedcontra = $mysql->efectuarConsulta("select id_administrador, nombres, apellidos, tipo_usuario_id_tipo_usuario from `administrador` where `documento` = '".$doc."' AND `clave` = '".$clave."'");   
        if(!empty($cedcontra)){
            if (mysqli_num_rows($cedcontra) > 0){ 
                while ($resultado= mysqli_fetch_assoc($cedcontra)){
                    $id_usuario= $resultado["id_administrador"];
                    $nombres= $resultado["nombres"];
                    $apellidos= $resultado["apellidos"];
                    $tipousuario= $resultado["tipo_usuario_id_tipo_usuario"];
                }
                $mysql->desconectar();
                session_start();//Inicio de sesion
                $_SESSION['id']=$id_usuario;
                $_SESSION['nombre']=$nombres.' '.$apellidos;
                $_SESSION['tipousuario']=$tipousuario;

                echo '1';
            }else{
                echo '0';
            }
        }else{
            echo "consultaVacia";
        }          
    }    
}  
?>