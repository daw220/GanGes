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
        <script src="../js/comida.js"></script>
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
                            <input class="borrar form-control" type="hidden" id="id"/>
                            <tr>
                                <td width="40%">Nombre</td>
                                <td width="60%"><input class="borrar form-control" type="text" id="nombre" required/></td>
                            </tr>
                            <tr id="des">
                                <td width="40%">Descripcion</td>
                                <td width="60%"><textarea class="borrar form-control" type="text" id="descripcion" required></textarea></td>
                            </tr>
                            <tr>
                                <td width="40%">Cantidad</td>
                                <td width="60%"><input class="borrar form-control" type="text" id="cantidad" required/></td>
                            </tr>
                            <tr id="cr">
                                <td width="40%">Cantidad restante</td>
                                <td width="60%"><input class="borrar form-control" type="text" id="cantidadr" required/></td>
                            </tr>
                            <tr id="pre">
                                <td width="40%">Precio total</td>
                                <td width="60%"><input class="borrar form-control" type="text" id="precio" required/></td>
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
            <h3 class="tLogin">COMIDA</h3>
            <button type="button" id="anadir" class="btn btn-success" data-toggle="modal" data-target="#myModal">Añadir</button>
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
    <div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="fun"></h4>
            </div>
            <div class="modal-body">
                <table style="width:80%; margin:auto;">
                    <input class="borrar form-control" type="hidden" id="id"/>
                    <tr>
                        <td width="40%">Nombre</td>
                        <td width="60%"><input class="borrar form-control" type="text" id="nombre" required/></td>
                    </tr>
                    <tr id="des">
                        <td width="40%">Descripcion</td>
                        <td width="60%"><textarea class="borrar form-control" type="text" id="descripcion" required></textarea></td>
                    </tr>
                    <tr>
                        <td width="40%">Cantidad</td>
                        <td width="60%"><input class="borrar form-control" type="text" id="cantidad" required/></td>
                    </tr>
                    <tr id="cr">
                        <td width="40%">Cantidad restante</td>
                        <td width="60%"><input class="borrar form-control" type="text" id="cantidadr" required/></td>
                    </tr>
                    <tr id="pre">
                        <td width="40%">Precio total</td>
                        <td width="60%"><input class="borrar form-control" type="text" id="precio" required/></td>
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
    <h3 class="tLogin">COMIDA</h3>
    <button type="button" id="anadir" class="btn btn-success" data-toggle="modal" data-target="#myModal">Añadir</button>
    <table class="table table-striped" id="tabla"></table>
    <a href="mPrincipal.php" type="button" id="volver" class="btn btn-danger">Volver</a>
</div>
</body> 
</html>