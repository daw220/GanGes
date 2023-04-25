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
        <h1>Inicio de session</h1>
        <form action="../vistas/acceso.php" method="post">
            <input type="text" name="correo" placeholder="Correo..."/><br/><br/>
            <input type="password" name="contraseña" placeholder="Contraseña..."/><br/><br/>
            <input type="submit" name="enviar" value="Entrar"/>
        </form>
        <a href="index.php" type="button" id="Session" class="btn btn-danger">Volver</a>
       
        
    </body>
</html>