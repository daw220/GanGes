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
    echo(LS());
?>
    </head>
    <body>
              <?php
    echo(sideBar());
    ?>  
        <h2>GESTACION</h2>
        <a href="mPrincipal.php" type="button" id="volver" class="btn btn-danger">Volver</a>
    </body>
</html>