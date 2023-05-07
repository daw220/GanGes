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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sjcl/1.0.8/sjcl.min.js"></script>
<script src="../js/registro.js"></script>
    </head>
    <body>

        <h2>Registro</h2>
        <p id="mensaje"></p>
        <input type="text" id="DNI"  placeholder="DNI" required/><br/><br/>
        <input type="text" id="nombre"  placeholder="Nombre" required/><br/><br/>
        <input type="text" id="apellido1"  placeholder="Primer Apellido" required/><br/><br/>
        <input type="text" id="apellido2"  placeholder="Segundo Apellido" required/><br/><br/>
        <input type="text" id="email"  placeholder="E-mail" required/><br/><br/>
        <input type="password" id="pass1" placeholder="Contraseña" required/><br/><br/>
        <input type="password" id="pass2" placeholder="Repite la contraseña" required/><br/><br/>
        <input type="button" id="enviar" class="btn btn-success" value="Registrarse"/>
        <br/>
        <a href="index.php" type="button" id="Session" class="btn btn-danger">Principal</a>
        <a href="inicio.php" type="button" id="Session" class="btn btn-warning">Inicio de sesión</a>
    </body>
</html>
