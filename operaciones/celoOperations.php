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
        $instruccion1 = "select a.ID, a.CROTAL, a.NOMBRE, a.tiempoExplotacion, v.DESCRIPCION, a.IDVITAL from animales a, vital v where a.habilitado ='1' and a.IDVITAL = v.ID and a.IDVITAL IN('3', '4', '5') order by a.IDVITAL asc";
        $res1=mysqli_query ($conexion, $instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
            $res3 = mysqli_fetch_array($res1);
            $tt ="";

            switch ($res3["IDVITAL"]) {
                case '3':                
                    $tt = 120;
                    break;
                case '4':              
                    $tt = 2;
                    break;
                case '5':               
                    $tt = 21;
                    break;             
                default:
                    $tt = 0;
                    break;
            }

            
            array_push($arr, array("ID"=>$res3["ID"], "CROTAL"=>$res3["CROTAL"], "NOMBRE"=>$res3["NOMBRE"], "vital"=>$res3["DESCRIPCION"], "tiempoExplotacion"=>$res3["tiempoExplotacion"],"tiempoExplotacionT"=>$tt));
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
             
            array_push($arr, array("ID"=>$res3["ID"],"CROTAL"=>$res3["CROTAL"],"NOMBRE"=>$res3["NOMBRE"], "vital"=>$res3["IDVITAL"]));
        }      
        echo json_encode($arr);
    }

    if($accion == 2)//editar(Numero)
    {
        $aux = 0;
        $vital = $_REQUEST["vital"];
        $id = $_REQUEST["id"];
        $tExplotacion = 0;

        switch ($vital) 
        {
            case '1':             
                $tExplotacion = 270;               
                break;
            case '2':               
                $tExplotacion = 420;
                break;
            case '3':                
                $tExplotacion = 120;
                break;
            case '4':              
                $tExplotacion = 2;
                break;
            case '5':               
                $tExplotacion = 21;
                break;
            case '6':               
                $tExplotacion = 0;
                break;
            default:
                break;
        }

        $instruccion1 = "UPDATE `animales` SET `IDVITAL`='$vital', `tiempoExplotacion`= '$tExplotacion' where ID ='$id'";
          
        mysqli_query ($conexion ,$instruccion1);
        $aux++;
         
        echo ($aux);       
        
    }

    if($accion == 3)//Listar(vitales de explotacion)
    {
        $id = $_REQUEST["id"];
        $instruccion = "select IDVITAL from animales where ID ='$id'";
        $res=mysqli_query ($conexion ,$instruccion);  
        $res2 = mysqli_fetch_array($res);

        $ide = $res2["IDVITAL"];

        $instruccion1 = "";

        if($ide == 3)
        {
            $instruccion1 = "select * from vital where ID IN('3','4','6')";
        }
        if($ide == 4)
        {
            $instruccion1 = "select * from vital where ID IN('4','5','6')";
        }
        if($ide == 5)
        {
            $instruccion1 = "select * from vital where ID IN('1','5','6')";
        }
            
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr = array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
             $res3 = mysqli_fetch_array($res1);
             
             array_push($arr, array("ID"=>$res3["ID"],"DESCRIPCION"=>$res3["DESCRIPCION"]));
        }      
        echo json_encode($arr);
    }    
    
    