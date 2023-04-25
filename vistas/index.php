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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"><img src="../src/logo.png" height="50px"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <a class="nav-link" href="./inicio.php">Inicio de sesion</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="./registro.php">Registro</a>
      </li>
  </div>
</nav>

</body>
</html>