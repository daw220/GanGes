<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $accion = $_REQUEST["accion"];
    
    
    if($accion == 0)//listar(JSON)
    {     
        echo json_encode(array(array("DNI"=>0, "NOMBRE"=>"hola")));
    }
    if($accion == 1)//Recuperar datos para edicion(JSON)
    {
        
    }
    if($accion == 2)//Añadir y editar(Numero)
    {
        
    }
    if($accion == 3)//Borrar(Numero)
    {
        
    }
    