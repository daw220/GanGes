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

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Principal</title>

         <?php
    echo(LS());
?>
  <script src="../js/mPrincipal.js"></script>
</head>
<body>
    <?php
    if(isset($_SESSION["valido"]))
    {
        $conexion = conexion_BD();
        $id= $_SESSION["valido"];               
        $instruccion1 = "select * from explotacion where IDUSUARIO ='$id'";
        $res1=mysqli_query ($conexion ,$instruccion1);            
        $res3 = mysqli_fetch_array($res1);
        $_SESSION["Explo"] = $res3["ID"];
        echo(sideBar());
        ?>
        <div class="caja pri" style="max-height: 70vh; height: 70vh;">
            <div class="row w-75">
                <div class="col-md-8">
                    <div id="car" class="carousel slide w-50 m-auto" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                        <li data-bs-target="#car" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#car" data-bs-slide-to="1"></li>
                        <li data-bs-target="#car" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../src/leche.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>GANGES</h5>
                            <p>AYUDAMOS A L@S GANADER@S DESDE LA RAÍZ.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../src/va.gif" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>TODO TIPO DE GESTIONES</h5>
                            <p>GANADERA, ADMINISTRATIVA, VETERINARIA, ETC.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../src/ter.gif" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>MÁXIMA CERCANÍA</h5>
                            <p>DE GANADEROS PARA GANADEROS.</p>
                            </div>
                        </div>
                        </div>
                        <a class="carousel-control-prev" href="#car" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                        </a>
                        <a class="carousel-control-next" href="#car" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="tLogin mb-5">PERFIL</h2>
                            <input type="hidden" id="id"/>
                            <input type="text" id="DNI" class="form-control mb-5"  placeholder="DNI" required/>
                            <input type="text" id="nombre" class="form-control mb-5" placeholder="Nombre" required/>
                            <input type="text" id="apellido1" class="form-control mb-5" placeholder="Primer Apellido" required/>
                            <input type="text" id="apellido2" class="form-control mb-5" placeholder="Segundo Apellido" required/>
                            <input type="text" id="email" class="form-control mb-5" placeholder="E-mail" required/>
                        </div>           
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="botones">
                                <input type="button" id="enviar" class="btn btn-success mb-5" value="EDITAR"/>
                            </div>
                        </div>      
                    </div>
                </div>            
            </div>
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
    