<?php

    $username ="root";
    $password ="";
    $server ="localhost";
    $datbase ="ppt_v1";

    // Crear conexion mysql 

    $conexion = new mysqli($server, $username, $password, $datbase);
    // Verificar conexion
    if ($conexion->connect_error){
        die ("Conexion fallida: ". $conexion->connect_error);
    }
    
?>