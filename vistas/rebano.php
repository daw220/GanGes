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
       <script src="../js/funcionalidad/rebano.js"></script> 
    </head>
    <body>
        <?php
    echo(sideBar());
    ?>  
        
    <h2>REBAÑO</h2>
        
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
                        <td width="40%">ID</td>
                        <td width="60%"><input class="borrar form-control" type="text" id="txtID" readonly /></td>
                    </tr>
                    <tr>
                        <td width="40%">Crotal</td>
                        <td width="60%"><input class="borrar obligatorio form-control" type="text" id="txtCrotal" /></td>
                    </tr>
                    <tr>
                        <td width="40%">Nombre </td>
                        <td width="60%"><input class="borrar obligatorio form-control" type="text" id="txtNom" /></td>
                    </tr>
                    <tr>
                        <td width="40%">Fecha de nacimiento</td>
                        <td width="60%"><input class="borrar obligatorio form-control" type="text" id="fecha" /></td>
                    </tr>
                    <tr>
                        <td width="40%">Sexo </td>
                        <td width="60%"><select class="borrar obligatorio form-control" type="text" id="idSexo"></select></td>
                    </tr>
                    <tr>
                        <td width="40%">Raza </td>
                        <td width="60%"><input class="borrar obligatorio form-control" type="text" id="txtRaza" /></td>
                    </tr>
                    <tr>
                        <td width="40%">Estado de explotacion </td>
                        <td width="60%"><select class="borrar obligatorio form-control" type="text" id="idExpltacion"></select></td>
                    </tr>
                    <tr>
                        <td width="40%">Estado vital </td>
                        <td width="60%"><select class="borrar obligatorio form-control" type="text" id="idVital"></select></td>
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
<div id="tablas"></div>
      <a href="mPrincipal.php" type="button" id="volver" class="btn btn-danger">Volver</a>
</body> 
</html>