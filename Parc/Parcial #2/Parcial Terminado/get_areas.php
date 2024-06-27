<?php
include 'conexion.php';

$departamento_id = $_GET['departamento'];
$sql = "SELECT id, opcion FROM areas_u_nacional WHERE relacion = $departamento_id";
$result = $conexion->query($sql);

$areas = array();
while($row = $result->fetch_assoc()) {
    $areas[] = $row;
}

echo json_encode($areas);

$conexion->close();
?>