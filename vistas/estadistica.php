<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    include "../lib/misfunciones.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
    if(isset($_SESSION["valido"]))
    {        
        echo(sideBar());
        ?> 
        <div class="caja pri">
            <h2>Estadisticas</h2>
            <h2>WIP</h2>
            <a href="mPrincipal.php" type="button" id="volver" class="btn btn-danger">Volver</a>
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