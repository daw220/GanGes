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
        $instruccion1 = "select * from comida where IDEXPLOTACION = '$explotacion'";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
            $res3 = mysqli_fetch_array($res1);
             
            array_push($arr, array("ID"=>$res3["ID"], "NOMBRE"=>$res3["NOMBRE"], "DESCRIPCION"=>$res3["DESCRIPCION"],"PRECIO"=>$res3["PRECIO"],"CANTIDADTOTAL"=>$res3["CANTIDADTOTAL"],"CANTIDADRESTANTE"=>$res3["CANTIDADRESTANTE"]));
        }      
            echo json_encode($arr);
    }

    if($accion == 1)//Recuperar datos para edicion(JSON)
    {
        $id = $_REQUEST["id"];
        $instruccion1 = "select * from comida where ID ='$id'";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
             $res3 = mysqli_fetch_array($res1);
             
             array_push($arr, array("ID"=>$res3["ID"], "NOMBRE"=>$res3["NOMBRE"], "CANTIDADRESTANTE"=>$res3["CANTIDADRESTANTE"]));
        }      
        echo json_encode($arr);
    }
    if($accion == 2) //editar(Numero)
    {
        $id = $_REQUEST["id"];
        $des = $_REQUEST["descripcion"];
        $nombre = $_REQUEST["nombre"];
        $precio = $_REQUEST["precio"];
        $cant = $_REQUEST["cantidadr"];
        $cant1 = $_REQUEST["cantidad"];
        $explotacion = $_SESSION["Explo"];
        $aux = 0;
        $instruccion1 = "";
     
        if($id == "")
        {
            $instruccion1 = "INSERT INTO comida VALUES (default, '$nombre', '$des', '$cant1', '$cant1', '$precio', '$explotacion')";
        }
        else
        {
            $instruccion1 = "UPDATE `comida` SET `CANTIDADRESTANTE` = CANTIDADRESTANTE - '$cant' where ID = '$id'";
        }

        mysqli_query ($conexion ,$instruccion1);
        $aux++;

        echo ($aux);       
        
    }  
    
    if($accion == 3) //ELIMINAR
    {
        $aux = 0;
        $id = $_REQUEST["id"];
     
        $instruccion1 = "DELETE from `comida` where ID = '$id'";

        mysqli_query ($conexion ,$instruccion1);
        $aux++;

        echo ($aux);           
    }  
    
    