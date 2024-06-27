<?php

include "conexion.php";

$existTabla = "SHOW TABLES LIKE 'registros_estudiantes'";
$result = $conexion->query($existTabla);

if($result->num_rows === 0){
    $query = "CREATE TABLE registros_estudiantes (
        cedula varchar (13) not null,
        nombre varchar (30) not null,
        apellido varchar (30) not null,
        facultad int (2) not null,
        departamento int (3) not null,
        area int (3) not null,
        primary key (cedula)
        )";

    if($conexion->query($query) === TRUE){
        echo "<br>Tabla registros_estudiantes fue creada exitosamente";
    } else {
        echo "<br>Error al crear la tabla registros_estudiantes: " . $conexion->error;
    }
} else {
    echo "<br>La tabla registros_estudiantes ya existe";
}

?>