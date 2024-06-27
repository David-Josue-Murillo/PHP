<?php
include 'conexion.php';

$facultad_id = $_GET['facultad_id'];
$sql = "SELECT id, opcion FROM departamento_u_nacional WHERE relacion = $facultad_id";
$result = $conexion->query($sql);

$departamentos = array();
while($row = $result->fetch_assoc()) {
    $departamentos[] = $row;
}

echo json_encode($departamentos);

$conexion->close();
?>