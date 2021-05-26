<?php 
session_start();//Inicio de sesion
$id_usuario1 = $_SESSION['id'];//Id del usuario actual
require_once '../../model/MySQL.php'; 
$mysql = new MySQL(); //se declara un nuevo array
$mysql->conectar();
$historial = $mysql->efectuarConsulta("SELECT `documento`, `nombres`, `apellidos`, `tipo_usuario_id_tipo_usuario` FROM `docente`");

while ($resultado= mysqli_fetch_assoc($historial)){
    $documento= $resultado["documento"];//Se obtiene el id del usuario 2
    $nombres= $resultado["nombres"];//Se obtiene el id del usuario 2
    $apellidos = $resultado["apellidos"];//Se obtiene el id del usuario 2
    $tipousuario= $resultado["tipo_usuario_id_tipo_usuario"];//Se obtiene el saldo del usuario 2    
    echo '
            {
              "data": [';
          echo '
                {
                  "documento": "'.$documento.'",
                  "nombres": "'.$nombres.'",
                  "apellidos": "'.$apellidos.'",
                  "tipousuario": "'.$tipousuario.'",
                }';
          echo '
              ]
            }';
}
      

$mysql->desconectar();

?>