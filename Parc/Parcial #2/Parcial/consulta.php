<?php

include "conexion.php";

$existTabla = "SHOW TABLES LIKE 'registros_estudiantes'";
$result = $conexion->query($existTabla);

if($result->num_rows === 0){
    $crearTabla = "CREATE TABLE registros_estudiantes (
        cedula VARCHAR (13) NOT NULL,
        nombre VARCHAR (30) NOT NULL,
        apellido VARCHAR (30) NOT NULL,
        facultad VARCHAR (40) NOT NULL,
        departamento VARCHAR (40) NOT NULL,
        area VARCHAR (40) NOT NULL,
        PRIMARY KEY (cedula)
    )";

    if($conexion->query($crearTabla) === TRUE){
        echo "<br>Tabla registros_estudiantes fue creada exitosamente";
    }else{
        echo "<br>Error al crear la tabla registros_estudiantes: " . $conexion->error;
    }
}else{
    echo "<br>La tabla registros_estudiantes ya existe";
}

?>