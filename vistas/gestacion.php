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
        <script src="../js/gestacion.js"></script>
<?php
    echo(LS());
?>
        
    </head>
    <body>
    <?php
    if(isset($_SESSION["valido"]))
    {        
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
                            <input class="borrar" type="hidden" id="txtId"/>
                            <tr>
                                <td width="40%">Crotal</td>
                                <td width="60%"><input class="borrar form-control" type="text" id="txtCrotal" readonly /></td>
                            </tr>
                            <tr>
                                <td width="40%">Nombre </td>
                                <td width="60%"><input class="borrar form-control" type="text" id="txtNom" readonly /></td>
                            </tr>
                            <tr>
                                <td width="40%">Estado</td>
                                <td width="60%"><select class="borrar form-control" type="text" id="idVital" required></select></td>
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
            <h3 class="tLogin">GESTACIÓN</h3>
            <table class="table table-striped" id="tabla"></table>
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