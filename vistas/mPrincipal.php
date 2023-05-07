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
    }
    else
    {
    ?>  
        <p>Acceso denegado</p>
        <a href="index.php" type="button" id="volver" class="btn btn-danger">Volver</a>
    <?php
    }    
    ?>  
    <h2>Menu principal</h2>
</body>
</html>

