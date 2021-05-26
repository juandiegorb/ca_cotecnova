<?php
    session_start();//Inicio de sesion
    //Validacion para comprobar si ya se ha iniciado sesion
    //Esto sirve para no permitir navegar entre paginas sin haberse logueado
    if(!isset($_SESSION['id'])){
        //no permite que se entre a las demas vistas por medio de la url
        header("location: ../index.php");
    }
?> 

<!-- /. ROW  -->
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Historial de transacci&oacute;n
      </div>
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li class="active"><a onclick="transacciont()" href="#transferencias" data-toggle="tab">Transferencias</a></li>
          <li class=""><a onclick="transacciond()" href="#depositos" data-toggle="tab">Depositos</a></li>
          <li class=""><a onclick="transaccionr()" href="#retiros" data-toggle="tab">Retiros</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade active in" id="transferencias">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <!-- /. ROW  -->