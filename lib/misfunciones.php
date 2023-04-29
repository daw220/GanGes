<?php

function conexion_BD(){
    $co = mysqli_connect("localhost", "root", "","GanGes")
    //$co = mysqli_connect("localhost", "root", "1234","ganges")
                or die ("No se puede conectar con el servidor");
    return $co;
};

function sideBar(){
     ?>
  <!-- Botón de abrir/cerrar sidebar -->
   <button type="button" id="sidebarCollapse" class="btn btn-outline-success">
       <span>&#9776;</span>
    </button>

  <!-- Sidebar -->
  <div class="bg-white" id="sidebar">
      <img src="../src/logo1.png" width="30px">
     <button type="button" id="cerrar" class="btn btn-outline-danger">
      <span>&#10005;</span>
    </button>
    <ul class="list-unstyled">
        <li><a href="./rebano.php" >Rebaño</a></li>
      <li class="dropdown dropdown-submenu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Explotacion</a>
        <ul class="dropdown-menu">
            <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Estado</a>
            <ul class="dropdown-menu">
                <li><a href="../vistas/gestacion.php">Gestacion</a></li>
                <li><a href="../vistas/crecimiento.php">Crecimiento</a></li>
                <li><a href="../vistas/celo.php">Celo e inseminacion</a></li>
                <li><a href="../vistas/engorde.php">Engorde</a></li>
            </ul>
          </li>
            <li><a href="../vistas/lactacia.php">Lactacia/Secado</a></li>
            <li><a href="../vistas/salud.php">Salud</a></li>
        </ul>
      </li>
        <li class="dropdown dropdown-submenu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produccion</a>
        <ul class="dropdown-menu">
            <li><a href="../vistas/alimentaria.php">Comida</a></li>
            <li><a href="../vistas/lactea.php">Lactea</a></li>
            <li><a href="../vistas/CVganado.php">Venta</a></li>
        </ul>
      </li>
      <li class="dropdown dropdown-submenu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios</a>
        <ul class="dropdown-menu">
          <li><a href="../vistas/estadistica.php">Estadisticas</a></li>
          <li><a href="../vistas/historico.php">Historico</a></li>
          <li><a href="../vistas/fincas.php">Fincas</a></li>
          <li><a href="../vistas/veterinario.php">Veterinario cercanos</a></li>
          <li><a href="../vistas/milAnuncios.php">Compra/Venta</a></li>
        </ul>
      </li>
    </ul>
      
      <a href="index.php" type="button" id="Session" class="btn btn-danger">
        <span style="font-size:22pt; ">&#9094;</span>
    </a>

  </div>

  <!-- Enlace a archivos de scripts de Bootstrap 4 y jQuery -->
    <?php
}
function LS(){
     ?>
    <link href="../css/style.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">   
    <link href="../css/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/nav.js"></script>
    <?php
}