<?php
    session_start();
    include "../lib/misfunciones.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bootstrap Sidebar</title>

  <!-- Enlace a archivo de estilos de Bootstrap 4 CSS -->
<?php
    echo(LS());
?>

</head>
<body>
<?php
    if(isset($_SESSION["valido"]))
    {
?>
  
    <h2>Acceso</h2>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Prueba</h5>
        <a href="mPrincipal.php" class="btn btn-primary">Entrar</a>
      </div>
    </div>
    <a href="index.php" type="button" id="volver" class="btn btn-danger">Volver</a>
 
    <?php
    }
    else
    {
    ?>
  
    <p>Acceso denegado</p>
    <a href="index.php" type="button" id="volver" class="btn btn-danger">Volver</a>
    <?php
    }    
    ?>
</body>
</html>
