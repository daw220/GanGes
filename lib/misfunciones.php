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
   <button type="button" id="sidebarCollapse" class="btn btn-light">
       <span>&#9776;</span>
    </button>

  <!-- Sidebar -->
<div class="bg-white" id="sidebar">
  <img src="../src/logo1.png">
  <button type="button" id="cerrar" class="btn btn-outline-danger">
    <span>&#10005;</span>
  </button>
  <div id="principal">
    <div class="list-group panel">
      <a href="./mPrincipal.php" class="list-group-item list-group-item-success">Inicio</a>
      <a href="./rebano.php" class="list-group-item list-group-item-success">Rebaño</a>
      <a href="#explotacion" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#principal"  id="es">Explotación<i class="fa fa-caret-down"></i></a>
      <div class="collapse" id="explotacion">
        <a href="#explotacion-menu" class="list-group-item" id="verde" data-toggle="collapse" data-parent="#explotacion-menu">Estado<i class="fa fa-caret-down"></i></a>
        <div class="collapse list-group-submenu" id="explotacion-menu">
          <a href="../vistas/gestacion.php" class="list-group-item" data-parent="#explotacion-menu">Gestación</a>
          <a href="../vistas/crecimiento.php" class="list-group-item" data-parent="#explotacion-menu">Crecimiento</a>
          <a href="../vistas/celo.php" class="list-group-item" data-parent="#explotacion-menu">Celo e inseminación</a>
          <a href="../vistas/engorde.php" class="list-group-item" data-parent="#explotacion-menu">Engorde</a>
        </div>          
        <a href="../vistas/lactacia.php" class="list-group-item" data-parent="#explotacion-menu" id="verde">Lactancia/Secado</a>
        <a href="../vistas/salud.php" class="list-group-item" data-parent="#explotacion-menu" id="verde">Salud</a>
      </div> 
      <a href="#produccion" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#principal" id="pr">Producción<i class="fa fa-caret-down"></i></a>
      <div class="collapse" id="produccion">
        <a href="../vistas/alimentaria.php" class="list-group-item" id="verde">Comida</a>
        <a href="../vistas/lactea.php" class="list-group-item" id="verde">Láctea</a>
        <a href="../vistas/CVganado.php" class="list-group-item" id="verde">Venta</a>
      </div>     
      <?php
      if( $_SESSION["rol"] == 2 )
      { 
      ?>
        <a href="#servicios" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#principal" id="se">Servicios<i class="fa fa-caret-down"></i></a>
        <div class="collapse" id="servicios">
          <a href="../vistas/estadistica.php" class="list-group-item" id="verde">Estadísticas</a>
          <a href="../vistas/historico.php" class="list-group-item" id="verde">Histórico</a>
          <a href="../vistas/fincas.php" class="list-group-item" id="verde">Fincas</a>
          <a href="../vistas/veterinario.php" class="list-group-item" id="verde">Veterinarios cercanos</a>
          <a href="../vistas/milAnuncios.php" class="list-group-item" id="verde">Compra/Venta</a>
        </div>     
      <?php
      }
      ?>
    </div>
  </div>  
  <a href="index.php" type="button" id="Session" class="btn btn-danger">
    <span>&#9094;</span>
  </a>
</div>


  <!-- Enlace a archivos de scripts de Bootstrap 4 y jQuery -->
    <?php
}
function LS(){
     ?>
    <link href="../css/style.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">   
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <?php
}