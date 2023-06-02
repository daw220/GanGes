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
        $instruccion1 = "select * from leche where IDEXPLOTACION = '$explotacion'";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
            $res3 = mysqli_fetch_array($res1);
             
            array_push($arr, array("ID"=>$res3["ID"], "MES"=>$res3["MES"], "CANTIDAD"=>$res3["CANTIDAD"],"PRECIO"=>$res3["PRECIO"],"GANANCIAS"=>$res3["GANANCIAS"]));
        }      
            echo json_encode($arr);
    }

    if($accion == 1)//Recuperar datos para edicion(JSON)
    {
        $id = $_REQUEST["id"];
        $instruccion1 = "select * from leche where ID ='$id'";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
             $res3 = mysqli_fetch_array($res1);
             
             array_push($arr, array("ID"=>$res3["ID"], "MES"=>$res3["MES"], "CANTIDAD"=>$res3["CANTIDAD"],"PRECIO"=>$res3["PRECIO"],"GANANCIAS"=>$res3["GANANCIAS"]));
        }      
        echo json_encode($arr);
    }
    if($accion == 2) //editar(Numero)
    {
        $id = $_REQUEST["id"];
        $mes = $_REQUEST["mes"];
        $cantidad = $_REQUEST["cantidad"];
        $precio = $_REQUEST["precio"];
        $ganancias = $_REQUEST["cantidad"] * $_REQUEST["precio"];
        $explotacion = $_SESSION["Explo"];
        $aux = 0;
        $instruccion1 = "";
     
        if($id == "")
        {
            $instruccion1 = "INSERT INTO leche VALUES (default, '$mes', '$cantidad', '$precio', '$ganancias', '$explotacion')";
        }
        else
        {
            $instruccion1 = "UPDATE `leche` SET `MES` = '$mes', `CANTIDAD`='$cantidad',`PRECIO`='$precio',`GANANCIAS`='$ganancias' where ID ='$id'";
        }

        mysqli_query ($conexion ,$instruccion1);
        $aux++;

        echo ($aux);       
        
    }  
    
    if($accion == 3) //ELIMINAR
    {
        $aux = 0;
        $id = $_REQUEST["id"];
     
        $instruccion1 = "DELETE from `leche` where ID = '$id'";

        mysqli_query ($conexion ,$instruccion1);
        $aux++;

        echo ($aux);           
    }  
    
    