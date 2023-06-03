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
    
    if($accion == 0)//Recuperar datos para edicion(JSON)
    {
        $id = $_SESSION["valido"];
        $instruccion1 = "select * from usuario where habilitado ='1' and ID ='$id'";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
            $res3 = mysqli_fetch_array($res1);
             
            array_push($arr, array("ID"=>$res3["ID"], "DNI"=>$res3["DNI"], "NOMBRE"=>$res3["NOMBRE"], "APELLIDO1"=>$res3["APELLIDO1"], "APELLIDO2"=>$res3["APELLIDO2"], "EMAIL"=>$res3["EMAIL"]));
        }      
        echo json_encode($arr);
    }
    if($accion == 1) //editar(Numero)
    {
        $aux = 0;
        $id = $_REQUEST["ID"];
        $DNI = $_REQUEST["DNI"];
        $NOMBRE = $_REQUEST["NOMBRE"];
        $AP1 = $_REQUEST["AP1"];
        $AP2 = $_REQUEST["AP2"];
        $EMAIL = $_REQUEST["EMAIL"];
        $instruccion1 ="UPDATE usuario SET DNI='$DNI', NOMBRE='$NOMBRE', APELLIDO1='$AP1', APELLIDO2='$AP2', EMAIL='$EMAIL' WHERE ID='$id'";
        mysqli_query ($conexion ,$instruccion1); 
        $aux++;

        echo ($aux);       
        
    }  
    
    
    