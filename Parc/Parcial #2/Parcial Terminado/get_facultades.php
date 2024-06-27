<?php
include 'conexion.php';

$sql = "SELECT id, opcion FROM facultades_u_nacional";
$result = $conexion->query($sql);

$facultades = array();
while($row = $result->fetch_assoc()) {
    $facultades[] = $row;
}

echo json_encode($facultades);

$conexion->close();
?>
