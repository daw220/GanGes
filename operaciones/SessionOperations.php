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
    
    
   
    if($accion == 1){

        $EMAIL = $_REQUEST["EMAIL"];
        $PASS = $_REQUEST["PASS"];

        $instruccion1 = "select ID from usuario where EMAIL = '$EMAIL' and CONTRASENA ='$PASS'";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        if($nf1 > 0){

            $res3 = mysqli_fetch_array($res1);
            $_SESSION["valido"]= $res3["ID"];
            
            echo '1';
        }
        else
        {
            echo $PASS;
        }
    }
    if($accion == 2){

        $aux =0;
        $DNI = $_REQUEST["DNI"];
        $NOMBRE = $_REQUEST["NOMBRE"];
        $AP1 = $_REQUEST["AP1"];
        $AP2 = $_REQUEST["AP2"];
        $EMAIL = $_REQUEST["EMAIL"];
        $PASS = $_REQUEST["PASS"];
        try 
        {
            $instruccion1 =" INSERT INTO `usuario`(`ID`, `DNI`, `NOMBRE`, `APELLIDO1`, `APELLIDO2`, `EMAIL`, `CONTRASEÑA`, `IDROL`, `habilitado`) VALUES (default,'$DNI','$NOMBRE','`$AP1','$AP2','$EMAIL','$PASS','3','1')";
            mysqli_query ($conexion ,$instruccion1);
            $aux++;
        } 
        catch (Exception $ex) 
        {
            $aux =0;
            echo ($ex);  
        }
       echo $aux;
    }
    if($accion == 3){
        $aux =0;
        $IDU = $_SESSION["ID"];
        $IDR = $_REQUEST["ID"];

        try 
        {
            "UPDATE `animales` SET `IDROL`='$IDR' where ID ='$IDU'";
            mysqli_query ($conexion ,$instruccion1);
            $aux++;
        } 
        catch (Exception $ex) 
        {
            $aux =0;
            echo ($ex);  
        }
        echo $aux;
    }
    
  
    
    