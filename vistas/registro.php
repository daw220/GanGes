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
        <h2>Registro</h2>
        <form action="../vistas/index.php" method="post">
            <br/>
            <input type="text" name="DNI"  placeholder="DNI"/><br/><br/>
            <input type="text" name="nombre"  placeholder="Nombre"/><br/><br/>
            <input type="text" name="apellido1"  placeholder="Primer Apellido"/><br/><br/>
            <input type="text" name="apellido2"  placeholder="Segundo Apellido"/><br/><br/>
            <input type="text" name="telefono"  placeholder="Telefono"/><br/><br/>
            <input type="text" name="correo"  placeholder="E-mail"/><br/><br/>
            <input type="password" name="password" placeholder="Contraseña"/><br/><br/>
            <input type="password" name="passwordMatchInput" placeholder="Repite la contraseña"/><br/><br/>
            <input type="submit" name="re" value="Registrarse"/>
        </form>
    <a href="index.php" type="button" id="Session" class="btn btn-danger">Volver</a>
    </body>
</html>
