<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "clase24x_Prueba24";

// Create connection
$conexion = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conexion->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}


?>