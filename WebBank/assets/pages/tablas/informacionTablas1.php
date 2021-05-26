<?php 
session_start();//Inicio de sesion
$id_usuario1 = $_SESSION['id'];//Id del usuario actual
require_once '../../model/MySQL.php'; 
$mysql = new MySQL(); //se declara un nuevo array
$mysql->conectar();
$historial = $mysql->efectuarConsulta("SELECT id_historial, id_usuario, id_usuario2, id_transacion, cantidad, fecha FROM historial");
$i=0;

while ($resultado= mysqli_fetch_assoc($historial)){
  if ($resultado["id_usuario2"] == $id_usuario1 && $resultado["id_transacion"]==1) {
    $id_historial[$i]= $resultado["id_historial"];//Se obtiene el id del usuario 2
    $id_usuario[$i]= $resultado["id_usuario"];//Se obtiene el id del usuario 2
    $id_usuario2[$i]= $resultado["id_usuario2"];//Se obtiene el id del usuario 2
    $id_transacion[$i]= $resultado["id_transacion"];//Se obtiene el saldo del usuario 2
    $cantidad[$i]= $resultado["cantidad"];//Se obtiene el id del usuario 2
    $fecha[$i]= $resultado["fecha"];//Se obtiene el saldo del usuario 2
    $usuario2 = $mysql->efectuarConsulta("SELECT numero_cedula, primer_nombre, primer_apellido FROM usuario WHERE id_usuario = '".$id_usuario[$i]."'");
    while ($resultado= mysqli_fetch_assoc($usuario2)){
      $numero_cedula[$i] =base64_decode($resultado["numero_cedula"]);
      $primer_nombre[$i]= base64_decode($resultado["primer_nombre"]);//Se obtiene el id del usuario 2
      $primer_apellido[$i]= base64_decode($resultado["primer_apellido"]);//Se obtiene el id del usuario 2
    }
    $i=$i+1;
  }
}
if($i>0){
  if ($i==1) {
      echo '
            {
              "data": [';

          echo '
                {
                  "id": "'.$i.'",
                  "name": "'.$numero_cedula[0].'",
                  "position": "'.$primer_nombre[0].' '.$primer_apellido[0].'",
                  "salary": "$'.$cantidad[0].'",
                  "start_date": "'.$fecha[0].'"
                }';

          echo '
              ]
            }';
  }else{
    
      echo '
            {
              "data": [';
      for ($j=0; $j<$i; $j++) { 
        if($j==$i-1){
          echo '
                {
                  "id": "'.$j.'",
                  "name": "'.$numero_cedula[$j].'",
                  "position": "'.$primer_nombre[$j].' '.$primer_apellido[$j].'",
                  "salary": "$'.$cantidad[$j].'",
                  "start_date": "'.$fecha[$j].'"
                }';
        }else{
          echo '
              {
                "id": "'.$j.'",
                "name": "'.$numero_cedula[$j].'",
                "position": "'.$primer_nombre[$j].' '.$primer_apellido[$j].'",
                "salary": "$'.$cantidad[$j].'",
                "start_date": "'.$fecha[$j].'"
              },';
          
        }
      }
          echo '
              ]
            }';
    }  
}else{
  echo '
            {
              "data": [
                {
                  "id": "",
                  "name": "",
                  "position": "",
                  "salary": "",
                  "start_date": ""
                }
              ]
            }';
}

$mysql->desconectar();

?>