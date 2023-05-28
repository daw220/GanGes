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
        $instruccion1 = "select a.ID, a.CROTAL, a.NOMBRE, e.DESCRIPCION, a.tiempoLactancia, a.IDESTADO from animales a, estadoexplotacion e  where habilitado ='1' and a.IDESTADO = e.ID order by a.IDESTADO asc";
        $res1=mysqli_query ($conexion, $instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
            $res3 = mysqli_fetch_array($res1);

            $tt ="";

            switch ($res3["IDESTADO"]) {
                case '1':                
                    $tt = 225;
                    break;
                case '2':              
                    $tt = 45;
                    break;             
                default:
                    $tt = 0;
                    break;
            }
            
            array_push($arr, array("ID"=>$res3["ID"], "CROTAL"=>$res3["CROTAL"], "NOMBRE"=>$res3["NOMBRE"], "estado"=>$res3["DESCRIPCION"], "tiempo"=>$res3["tiempoLactancia"], "tiempoT"=>$tt));
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
             
            array_push($arr, array("ID"=>$res3["ID"],"CROTAL"=>$res3["CROTAL"],"NOMBRE"=>$res3["NOMBRE"], "estado"=>$res3["IDESTADO"]));
        }      
        echo json_encode($arr);
    }

    if($accion == 2)//editar(Numero)
    {
        $aux = 0;
        $explotacion = $_REQUEST["estado"];
        $id = $_REQUEST["id"];
        
        if($explotacion == 1)
        {
            $instruccion1 = "UPDATE `animales` SET `IDESTADO`='$explotacion', `tiempoLactancia`='225' where ID ='$id'";
        }
        else
        {
            if($explotacion == 2)
            {
                $instruccion1 = "UPDATE `animales` SET `IDESTADO`='$explotacion', `tiempoLactancia`='45' where ID ='$id'";
            }
            else
            {
                $instruccion1 = "UPDATE `animales` SET `IDESTADO`='$explotacion', `tiempoLactancia`='0' where ID ='$id'";
            }
            
        }
        
        mysqli_query ($conexion ,$instruccion1);
        $aux++;
         
        echo ($aux);       
        
    }

    if($accion == 3)//Listar(Estado de explotacion)
    {
        $instruccion1 = "select * from estadoexplotacion";
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
    
    