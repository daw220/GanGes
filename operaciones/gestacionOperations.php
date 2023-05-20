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
        $instruccion1 = "select a.ID, a.CROTAL, a.NOMBRE, a.tiempoExplotacion, v.DESCRIPCION from animales a, vital v where a.habilitado ='1' and a.IDVITAL = v.ID and a.IDVITAL = 1 order by a.IDVITAL asc";
        $res1=mysqli_query ($conexion, $instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
            $res3 = mysqli_fetch_array($res1);
            
            array_push($arr, array("ID"=>$res3["ID"], "CROTAL"=>$res3["CROTAL"], "NOMBRE"=>$res3["NOMBRE"], "vital"=>$res3["DESCRIPCION"], "tiempoExplotacion"=>$res3["tiempoExplotacion"]));
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
        $fecha = date("d/m/Y");
        $instruccion = "select IDVITAL from animales where ID ='$id'";
        $res=mysqli_query ($conexion ,$instruccion);  
        $res2 = mysqli_fetch_array($res);
        $ide = $res2["IDVITAL"];

        $inst = "select CONCAT(CROTAL , ' - CRIA') as nombre from animales where ID = $id";
        $r=mysqli_query ($conexion ,$inst);  
        $r1 = mysqli_fetch_array($r);
        $nombre = $r1["nombre"];

        $inst1 = "select RAZA from animales where ID = $id";
        $r11=mysqli_query ($conexion ,$inst1);  
        $r2 = mysqli_fetch_array($r11);
        $raza = $r2["RAZA"];

        $explotacion = $_SESSION["Explo"];

        if($vital != $ide)
        {
            $instruccion1 = "INSERT INTO `animales`(`ID`, `CROTAL`, `NOMBRE`, `fechaNacimiento`, `IDSEXO`, `RAZA`, `SALUD`, `tiempoExplotacion`, `IDEXPLOTACION`, `IDVITAL`, `tiempoLactancia`, `IDESTADO`, `habilitado`) VALUES (default, null, '$nombre','$fecha','2', '$raza', null,'420','$explotacion','2','0','3','1')";
            mysqli_query ($conexion ,$instruccion1);
            
            $instruccion2 = "UPDATE `animales` SET `IDVITAL`='3', `tiempoExplotacion`= '120' where ID ='$id'";
            mysqli_query ($conexion ,$instruccion2);
            
            $aux++;

        }
        else{

            $aux = -1;
        }
 
        echo ($aux); 
  
    }

    if($accion == 3)//Listar(vitales de explotacion)
    {
        $instruccion1 = "select * from vital where ID IN('1','2','3')";
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
    
    