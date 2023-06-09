<?php
    session_start();
    include "../lib/misfunciones.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Acceso</title>

  <!-- Enlace a archivo de estilos de Bootstrap 4 CSS -->
<?php
    echo(LS());
?>
<script src="https://www.paypal.com/sdk/js?client-id=AUFcvqZLDDRSazztPntd2hKs-L1afkI6-FyNgJaXnOLOtqqP46u7vtdsGLyteYHZxwJG6FTLlmW9Sf2P&currency=EUR"></script>
<script src="../js/paypal.js"></script>
</head>
<body>
<?php
    if(isset($_SESSION["valido"]))
    {
      $conexion = conexion_BD(); 
      $id= $_SESSION["valido"];               
      $instruccion1 = "select IDROL from usuario where ID ='$id'";
      $res1=mysqli_query ($conexion ,$instruccion1);            
      $res3 = mysqli_fetch_array($res1);
      $_SESSION["rol"] = $res3["IDROL"];
           
       
?>
    <div class="ac1">
      <div class="row" style="width: 100%;">
        <div class="col-md-4 d-none" id="explo"  >
          <div class="card rounded-5"style="width: 100%; height: 100%" >
            <div class="card-body">
              <h5 class="card-title" id="nombre" ></h5>
              <a href="./mPrincipal.php" class="btn btn-primary">Entrar</a>
            </div>
          </div>
        </div>
      </div>  
    </div>
    <div class="caja1 ac2">
      <div class="row py-4" style="width: 100%;">
      <div class="col-md-2"></div>
        <div class="col-md-3">
          <div class="card rounded-5" >
            <img src="../src/calm.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Plan Basico</h5>
              <div id="botonBasico"></div>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3">
          <div class="card rounded-5">
            <img src="../src/vaca.webp"  class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Plan Avanzado</h5>
              <div id="botonAvanzado"></div>
            </div>
          </div>
        </div>
      </div> 
        <div class="row py-4" style="width: 100%;">
        <div class="col-md-5"></div>
          <div class="col-md-2">
            <a href="index.php" type="button" id="volver" class="btn btn-danger col-md-12">Volver</a>
          </div>
        <div class="col-md-5"></div>
      </div>
    </div>         
   
    
 
    <?php
    }
    else
    {
    ?>
  <div class="caja pri">
        <p class="text-uppercase text-center">Acceso denegado</p>
        <a href="index.php" type="button" id="volver" class="btn btn-danger">Volver</a>
    </div>
    <?php
    }    
    ?>
</body>
</html>
