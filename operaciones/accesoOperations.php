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
    $id = $_SESSION["valido"];
    
    if($accion == 0)//Añadir y editar(explotacion)
    {
        $aux =0;
        try
        {

            $rol = $_REQUEST["rol"];
            $instruccion1 = "INSERT INTO `explotacion`(`ID`, `NOMBRE`, `IDUSUARIO`) VALUES (default,(select CONCAT('Explotacion',NOMBRE) from usuario where id = '$id'),'$id')";
            mysqli_query ($conexion ,$instruccion1);

            $instruccion1 = "UPDATE `usuario` SET `IDROL`='$rol' where ID ='$id'";
            mysqli_query ($conexion ,$instruccion1);
            $aux++;
            
        } catch (Exception $ex) {
            $aux =0;
            echo ($ex);  
        }
         
        echo ($aux);       
        
    }
    if($accion == 1)//Añadir y editar(Numero)
    {
        $aux =" ";
        try
        {
            $instruccion1 = "select NOMBRE from explotacion where IDUSUARIO ='$id' ";
            $res1=mysqli_query ($conexion ,$instruccion1);
            $nf1= mysqli_num_rows($res1);
            
            if($nf1>0)
            {
                $res3 = mysqli_fetch_array($res1);
                $aux= $res3['NOMBRE'];               
            }
           
        } catch (Exception $ex) {
            $aux =" ";
            echo ($ex);  
        }
         
        echo ($aux);       
        
    }
    if($accion == 2)//Añadir y editar(Numero)
    {
        $aux =" ";
        try
        {
            $instruccion1 = "select IDROL from usuario where ID ='$id' ";
            $res1=mysqli_query ($conexion ,$instruccion1);
            $nf1= mysqli_num_rows($res1);
            
            if($nf1>0)
            {
                $res3 = mysqli_fetch_array($res1);
                $aux= $res3['IDROL'];               
            }
           
        } catch (Exception $ex) {
            $aux =" ";
            echo ($ex);  
        }
         
        echo ($aux);       
        
    }