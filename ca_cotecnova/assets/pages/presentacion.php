<?php
    session_start();//Inicio de sesion
    //Validacion para comprobar si ya se ha iniciado sesion
    //Esto sirve para no permitir navegar entre paginas sin haberse logueado
    if(!isset($_SESSION['id'])){
        //no permite que se entre a las demas vistas por medio de la url
        header("location: ../index.php");
    }
?>
<div class="col-md-4 col-sm-4">
  <div class="panel panel-danger  text-center">
      <div class="panel-heading">
          <h3>Transferir</h3>
      </div>
      <div class="panel-body">
          <h4>¿Ya hiciste tu transferencia?</h4>
          Aquí puedes transferir dinero a otras cuentas que tenga vínculo con Web Bank.
      </div>
      <div class="panel-footer">
          <button onclick="btntransferir()" type="button" class="btn btn-lg btn-block btn-danger">Ir allí</button>
      </div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="panel panel-danger  text-center">
      <div class="panel-heading">
          <h3>Depositar</h3>
      </div>
      <div class="panel-body">
          <h4>¿Te interesa hacer un depósito?</h4>
          Puedes depositar el monto deseado desde 1000 pesos a la cuenta que quieras sin costo.
      </div>
      <div class="panel-footer">
          <button onclick="btndepositar()" type="button" class="btn btn-lg btn-block btn-danger">Ir allí</button>
      </div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="panel panel-danger  text-center">
      <div class="panel-heading">
          <h3>Retirar</h3>
      </div>
      <div class="panel-body">
          <h4>Retira tu dinero cuando quieras</h4>
          Con Web Bank tienes la libertidad de escoger el momento y lugar de retirar.
      </div>
      <div class="panel-footer">
          <button onclick="btnretirar()" type="button" class="btn btn-lg btn-block btn-danger">Ir allí</button>
      </div>
  </div>
</div>