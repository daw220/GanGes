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
    <div class="caja login">
        <div class="row w-75">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div style="width:100%; display:flex; justify-content:center;">
                    <img  src="../src/logo.png" height="150px"/>   
                 </div>
                
                <input type="text" id="DNI" class="form-control"  placeholder="DNI" required/><br/><br/>
                <input type="text" id="nombre" class="form-control" placeholder="Nombre" required/><br/><br/>
                <input type="text" id="apellido1" class="form-control" placeholder="Primer Apellido" required/><br/><br/>
                <input type="text" id="apellido2" class="form-control" placeholder="Segundo Apellido" required/><br/><br/>
                <input type="text" id="email" class="form-control" placeholder="E-mail" required/><br/><br/>
                <input type="password" id="pass1" class="form-control" placeholder="Contraseña" required/><br/><br/>
                <input type="password" id="pass2" class="form-control" placeholder="Repite la contraseña" required/><br/><br/>
                <div class="botones">
                    <input type="button" id="enviar" class="btn btn-success" value="Registrarse"/>
                    <a href="index.php" type="button" id="Session" class="btn btn-danger">Volver</a>
                </div>
            </div>
            <div class="col-md-2"></div>            
        </div>
        <p id="mensaje" style="display:absolute; left:12.5%;"></p>
    </div>
    </body>
</html>
