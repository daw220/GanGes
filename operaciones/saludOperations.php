<?php

include ("../lib/misfunciones.php");
include ("../lib/fecha.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $conexion = conexion_BD();

    $accion = $_REQUEST["accion"];
    
    
    if($accion == 0)//listar(JSON)
    {     
        $instruccion1 = "select * from animales where SALUD IS NOT NULL";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
            $res3 = mysqli_fetch_array($res1);
             
            array_push($arr, array("ID"=>$res3["ID"], "CROTAL"=>$res3["CROTAL"],"NOMBRE"=>$res3["NOMBRE"], "SALUD"=>$res3["SALUD"]));
        }      
            echo json_encode($arr);
    }
    if($accion == 1)//Recuperar datos para edicion(JSON)
    {
        $id = $_REQUEST["id"];
        $instruccion1 = "select * from animales where habilitado ='1' and ID ='$id'";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
             $res3 = mysqli_fetch_array($res1);
             
             array_push($arr, array("ID"=>$res3["ID"], "CROTAL"=>$res3["CROTAL"], "SALUD"=>$res3["SALUD"]));
        }      
        echo json_encode($arr);
    }
    if($accion == 2) //editar(Numero)
    {
        $aux = 0;
        $crotal =$_REQUEST["crotal"];
        $salud=$_REQUEST["salud"];
     
        $instruccion1 = "UPDATE `animales` SET `SALUD`='$salud' where ID = '$crotal'";

        mysqli_query ($conexion ,$instruccion1);
        $aux++;

        echo ($aux);       
        
    }  

    if($accion == 3)//Listar(crotales)
    {
        $instruccion1 = "select * from animales where habilitado ='1' and SALUD IS NULL";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
            $res3 = mysqli_fetch_array($res1);
             $aux = $res3["CROTAL"]." - ".$res3["NOMBRE"];
            array_push($arr, array("ID"=>$res3["ID"], "CROTAL"=> $aux));
        }      
        echo json_encode($arr);
    }
    
    if($accion == 4) //recuperacion
    {
        $aux = 0;
        $crotal =$_REQUEST["ID"];
     
        $instruccion1 = "UPDATE `animales` SET `SALUD`= null where ID = '$crotal'";

        mysqli_query ($conexion ,$instruccion1);
        $aux++;

        echo ($aux);       
        
    }  
    
    