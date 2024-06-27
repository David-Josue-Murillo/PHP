<?php

$server = "localhost";
$username = "root";
$password = "root";
$database = "clase24x_Prueba24";

$conexion = new mysqli($server, $username, $password, $database);
if($conexion->connect_error){
    die("Conexion fallida: ". $conexion->connect_error);
} else {
    echo "Conexion exitosa";
}

$conexion->query("SET NAMES 'utf8'");

?>