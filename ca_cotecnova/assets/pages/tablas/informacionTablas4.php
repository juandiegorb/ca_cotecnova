<?php 
session_start();//Inicio de sesion
$id_usuario1 = $_SESSION['id'];//Id del usuario actual
require_once '../../model/MySQL.php'; 
$mysql = new MySQL(); //se declara un nuevo array
$mysql->conectar();
$historial = $mysql->efectuarConsulta("SELECT id_usuario, id_transacion, cantidad, fecha FROM historial");
$i=0;

while ($resultado= mysqli_fetch_assoc($historial)){
  if ($resultado["id_usuario"] == $id_usuario1 && $resultado["id_transacion"]==3) {
    $cantidad[$i]= $resultado["cantidad"];//Se obtiene el id del usuario 2
    $fecha[$i]= $resultado["fecha"];//Se obtiene el saldo del usuario 2
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
                  "salary": "$'.$cantidad[$j].'",
                  "start_date": "'.$fecha[$j].'"
                }';
        }else{
          echo '
              {
                "id": "'.$j.'",
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