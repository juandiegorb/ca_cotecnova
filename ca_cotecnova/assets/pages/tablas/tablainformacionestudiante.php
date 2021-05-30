<?php 
session_start();//Inicio de sesion
$id_usuario1 = $_SESSION['id'];//Id del usuario actual
require_once '../../model/MySQL.php'; 
$mysql = new MySQL(); //se declara un nuevo array
$mysql->conectar();
$historial = $mysql->efectuarConsulta("SELECT `documento`, `nombres`, `apellidos`, `tipo_usuario_id_tipo_usuario` FROM `docente`");
$i=0;

while ($resultado= mysqli_fetch_assoc($historial)){
    $documento[$i]= $resultado["documento"];//Se obtiene el id del usuario 2
    $nombres[$i]= $resultado["nombres"];//Se obtiene el id del usuario 2
    $apellidos[$i] = $resultado["apellidos"];//Se obtiene el id del usuario 2
    $tipousuario[$i]= $resultado["tipo_usuario_id_tipo_usuario"];//Se obtiene el saldo del usuario 2   
    $i=$i+1;
}

if($i>0){
  if ($i==1) {
      echo '
            {
              "data": [';
          echo '
                {
                  "documento": "'.$documento[0].'",
                  "nombres": "'.$nombres[0].'",
                  "apellidos": "'.$apellidos[0].'",
                  "tipo_usuario_id_tipo_usuario": "'.$tipousuario[0].'"
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
                "documento": "'.$documento[$j].'",
                "nombres": "'.$nombres[$j].'",
                "apellidos": "'.$apellidos[$j].'",
                "tipo_usuario_id_tipo_usuario": "'.$tipousuario[$j].'"
                }';
        }else{
          echo '
              {
                "documento": "'.$documento[$j].'",
                "nombres": "'.$nombres[$j].'",
                "apellidos": "'.$apellidos[$j].'",
                "tipo_usuario_id_tipo_usuario": "'.$tipousuario[$j].'"
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
                  "documento": "",
                  "nombres": "",
                  "apellidos": "",
                  "tipo_usuario_id_tipo_usuario": ""
                }
              ]
            }';
}

$mysql->desconectar();

?>