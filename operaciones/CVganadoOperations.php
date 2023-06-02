<?php

include ("../lib/misfunciones.php");
include ("../lib/fecha.php");
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $conexion = conexion_BD();

    $accion = $_REQUEST["accion"];
    
    

if($accion == 0)//listar(JSON)
{     
    $explotacion = $_SESSION["Explo"];
    $instruccion1 = "select ID, (select CROTAL from animales where ID = c.CROTAL) as cr, PRECIO, DESCRIPCION from compraventa c where IDEXPLOTACION = '$explotacion'";
    $res1=mysqli_query ($conexion ,$instruccion1);
    $nf1= mysqli_num_rows($res1);
    
    $arr= array();        
            
    for ($i=0; $i<$nf1; $i++)
    {
        $res3 = mysqli_fetch_array($res1);
            
        array_push($arr, array("ID"=>$res3["ID"], "CROTAL"=>$res3["cr"],"PRECIO"=>$res3["PRECIO"], "DESCRIPCION"=>$res3["DESCRIPCION"]));
    }      
        echo json_encode($arr);
}

if($accion == 1)//Recuperar datos para edicion(JSON)
{
    $id = $_REQUEST["id"];
    $instruccion1 = "select * from compraventa where ID ='$id'";
    $res1=mysqli_query ($conexion ,$instruccion1);
    $nf1= mysqli_num_rows($res1);
    
    $arr= array();        
            
    for ($i=0; $i<$nf1; $i++)
    {
            $res3 = mysqli_fetch_array($res1);
            
            array_push($arr, array("ID"=>$res3["ID"], "CROTAL"=>$res3["CROTAL"],"PRECIO"=>$res3["PRECIO"], "DESCRIPCION"=>$res3["DESCRIPCION"]));
    }      
    echo json_encode($arr);
}
if($accion == 2) //editar(Numero)
{
    $id = $_REQUEST["id"];
    $crotal = $_REQUEST["crotal"];
    $precio = $_REQUEST["precio"];
    $des = $_REQUEST["descripcion"];
    $explotacion = $_SESSION["Explo"];
    $aux = 0;
    $instruccion1 = "";
    
    if($id == "")
    {
        $instruccion1 = "INSERT INTO compraventa VALUES (default, '$crotal', '$precio', '$des', '$explotacion')";

        $instruccion2 = "UPDATE `animales` SET `habilitado` = '0' where ID = '$crotal'";
        mysqli_query ($conexion, $instruccion2);

    }
    else
    {
        $instruccion1 = "UPDATE `compraventa` SET `CROTAL` = '$crotal', `PRECIO` = '$precio', `DESCRIPCION` = '$des' where ID = '$id'";
    }

    mysqli_query ($conexion ,$instruccion1);
    $aux++;

    echo ($aux);       
    
}  

if($accion == 3) //ELIMINAR
{
    $aux = 0;
    $id = $_REQUEST["id"];
    
    $instruccion1 = "DELETE from `compraventa` where ID = '$id'";

    mysqli_query ($conexion ,$instruccion1);
    $aux++;

    echo ($aux);           
}  

if($accion == 4)
{
    $instruccion1 = "SELECT * from animales where IDVITAL = 6 and habilitado ='1'";
    $res1 = mysqli_query($conexion, $instruccion1);
    $numFilas = mysqli_num_rows($res1);

    $arr= array();  

    for ($i=0; $i < $numFilas; $i++)
    {
        $res3 = mysqli_fetch_array($res1);
        
        array_push($arr, array("ID"=>$res3["ID"], "CROTAL"=>$res3["CROTAL"], "NOMBRE"=>$res3["NOMBRE"]));
    }      
    echo json_encode($arr);

}

    