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
        <script src="../js/salud.js"></script>
<?php
    echo(LS());
?>
        
    </head>
    <body>
        <?php
    echo(sideBar());
    ?>  
        
    <div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="fun"></h4>
            </div>
            <div class="modal-body">
                <table style="width:80%; margin:auto;">
                    <tr>
                        <td width="40%">Crotal</td>
                        <td width="60%"><select class="borrar form-control" type="text" id="txtCrotal" required></select></td>
                    </tr>
                    <tr>
                        <td width="40%">Salud</td>
                        <td width="60%"><textarea class="borrar form-control" type="text" id="salud" required></textarea></td>
                    </tr>
                </table>
                <p id="mensaje"></p>
            </div>
            <div class="modal-footer">
                <input type="button" onclick="anadir()" class="btn btn-success" id="btnaceptar" value="Aceptar"/>
                <input type="button" class="btn btn-danger" data-dismiss="modal" id="btncancelar"value="Cancelar"/>
            </div>
        </div>

    </div>
</div>
    
<div class="caja pri">
    <h3 class="tLogin">SALUD</h3>
    <button type="button" id="anadir" class="btn btn-success" data-toggle="modal" data-target="#myModal">Añadir</button>
    <table class="table table-striped" id="tabla"></table>
    <a href="mPrincipal.php" type="button" id="volver" class="btn btn-danger">Volver</a>
</div>
</body> 
</html>