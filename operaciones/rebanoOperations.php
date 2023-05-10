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
        $id = $_SESSION["Explo"];
        $instruccion1 = "select * from animales where habilitado ='1' and IDEXPLOTACION ='$id' ";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
             $res3 = mysqli_fetch_array($res1);
             
             array_push($arr, array("ID"=>$res3["ID"],"CROTAL"=>$res3["CROTAL"],"NOMBRE"=>$res3["NOMBRE"],"fechaNacimiento"=>$res3["fechaNacimiento"],"raza"=>$res3["RAZA"]));
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
             
             array_push($arr, array("ID"=>$res3["ID"],"CROTAL"=>$res3["CROTAL"],"NOMBRE"=>$res3["NOMBRE"],"fechaNacimiento"=>$res3["fechaNacimiento"],"sexo"=>$res3["IDSEXO"],"raza"=>$res3["RAZA"],"vital"=>$res3["IDVITAL"],"estado"=>$res3["IDESTADO"]));
        }      
        echo json_encode($arr);
    }
    if($accion == 2)//Añadir y editar(Numero)
    {
        $aux = 0;
        $id = $_REQUEST["idAni"];
        $crotal =$_REQUEST["crotal"];
        $nombre= $_REQUEST["nombre"];
        $fecha=$_REQUEST["fecha"];
        $sexo = $_REQUEST["sexo"];
        $raza =$_REQUEST["raza"];
        $vital=$_REQUEST["vital"];
        $estado = $_REQUEST["explo"];
        $tExplotacion = 0;
        $tLactancia = 0;

        switch ($vital) 
        {
            case '1':             
                $tExplotacion = 270;               
                break;
            case '2':               
                $tExplotacion = 420;
                break;
            case '3':                
                $tExplotacion = 2;
                break;
            case '4':              
                $tExplotacion = 21;
                break;
            case '5':               
                $tExplotacion = 0;
                break;
            default:
                break;
        }
        
        if($estado == 1)
        {
            $tLactancia = 225;
        }
        else
        {
            $tLactancia = 45;
        }

        try
        {

            if($id == "")
            {
                $instruccion1 = "INSERT INTO `animales`(`ID`, `CROTAL`, `NOMBRE`, `fechaNacimiento`, `IDSEXO`, `RAZA`, `SALUD`, `tiempoExplotacion`, `IDEXPLOTACION`, `IDVITAL`, `tiempoLactancia`, `IDESTADO`, `habilitado`) VALUES (default,'$crotal','$nombre','$fecha','$sexo','$raza', null,'$tExplotacion','3','$vital', '$tLactancia','$estado','1')";
                mysqli_query ($conexion ,$instruccion1);
                $aux++;
            }
            else
            {
                $instruccion1 = "UPDATE `animales` SET `CROTAL`='$crotal',`NOMBRE`='$nombre',`fechaNacimiento`='$fecha',`IDSEXO`='$sexo',`RAZA`='$raza',`IDVITAL`='$vital',`IDESTADO`='$estado',`tiempoExplotacion`='$tExplotacion',`tiempoLactancia`='$tLactancia' where ID ='$id'";
                
                mysqli_query ($conexion ,$instruccion1);
                $aux++;
            }        
            
        } catch (Exception $ex) {
            $aux =0;
            echo ($ex);  
        }
         
        echo ($aux);       
        
    }
    if($accion == 3)//Borrar(Numero)
    {
         $aux = 0;
        $id = $_REQUEST["ID"];
        
        
        try
        {
            $instruccion1 = "UPDATE `animales` SET `habilitado`='0' where ID ='$id'";
            mysqli_query ($conexion ,$instruccion1);
            $aux++;       
            
        } catch (Exception $ex) {
            $aux =0;  
            echo $ex;
        }
         
        echo ($aux); 
    }
    if($accion == 4)//Listar(SEXO)
    {
        $instruccion1 = "select * from sexo";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
             $res3 = mysqli_fetch_array($res1);
             
             array_push($arr, array("ID"=>$res3["ID"],"DESCRIPCION"=>$res3["DESCRIPCION"]));
        }      
        echo json_encode($arr);
    }    
    if($accion == 5)//Listar(Estado de explotacion)
    {
        $instruccion1 = "select * from estadoexplotacion";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
             $res3 = mysqli_fetch_array($res1);
             
             array_push($arr, array("ID"=>$res3["ID"],"DESCRIPCION"=>$res3["DESCRIPCION"]));
        }      
        echo json_encode($arr);
    }    
    if($accion == 6)//Listar(Estado vital)
    {
        $instruccion1 = "select * from vital";
        $res1=mysqli_query ($conexion ,$instruccion1);
        $nf1= mysqli_num_rows($res1);
        
        $arr= array();        
                
        for ($i=0; $i<$nf1; $i++)
        {
             $res3 = mysqli_fetch_array($res1);
             
             array_push($arr, array("ID"=>$res3["ID"],"DESCRIPCION"=>$res3["DESCRIPCION"]));
        }      
        echo json_encode($arr);
    }
    
    