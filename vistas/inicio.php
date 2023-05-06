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
<script src="../js/inicioS.js"></script>

    </head>
    <body>
        <p id="mensaje"></p>
        <input type="text" id="email" placeholder="Correo..." required/><br/><br/>
        <input type="password" id="pass" placeholder="Contraseña..." required/><br/><br/>
        <input type="button" class="btn btn-success" id="enviar" value="Entrar"/>
        <a href="index.php" type="button" id="Session" class="btn btn-danger">Volver</a>
    </body>
</html>