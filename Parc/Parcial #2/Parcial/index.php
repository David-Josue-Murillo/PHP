<?php
include "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de estudiantes</title>
    <style>
        :root{
            color-scheme: light dark;
        }

        div{
            margin: 0 auto;
            width: 30%;
            text-align: center;
        }

        form{
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        input[type="text"]{
            padding: 5px;
        }

        select{
            padding: 5px;
        }

        input[type="submit"]{
            padding: 10px;
            margin-top: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <div>
        <form>
            <label for="cedula">Cedula:</label>
            <input type="text" name="cedula" id="cedula">
            <br>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
            <br>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido">
            <br>

            <!-- Al escoger una facultad, la lista de departamento se muestra automagicamente -->
            <label for="facultad">Facultad:</label>
            <select name="facultad" id="facultad">
                <option value="0">Seleccionar facultad</option>
                <?php
                $query = "SELECT * FROM facultades_u_nacional";
                $result = $conexion->query($query);

                if($result->num_rows > 0){
                    while($fila = $result->fetch_assoc()){
                        echo "<option value= '".$fila['id']."'>" . $fila['opcion'] . "</option>";
                    }
                }else{
                    echo "<option value='0'>No hay facultades registradas</option>";
                }
                ?>
            </select>
            <br>
            
            <!-- Lista de departamentos -->
            <label for="departamento">Departamento:</label>
            <select name="departamento" id="departamento">
                <option value="0">Seleccionar departamento</option>
                <?php
                if(isset($_GET['facultad'])){
                    $query = "SELECT * FROM departamentos_u_nacional WHERE relacion = " . $_GET['facultad'];
                    $result = $conexion->query($query);
                    
                    if($result->num_rows > 0){
                        while($fila = $result->fetch_assoc()){
                            echo "<option value= '".$fila['id']."'>" . $fila['opcion'] . "</option>";
                        }
                    }else{
                        echo "<option value='0'>No hay departamentos registrados</option>";
                    }
                } else {
                    echo "<option value='0'>No hay departamentos registrados</option>";
                }
                ?>
            </select>
            <br>

            <!-- Lista de areas -->
            <label for="area">Area:</label>
            <select name="area" id="area">
                <option value="0">Seleccionar area</option>
                <?php
                $query = "SELECT * FROM areas_u_nacional";
                $result = $conexion->query($query);

                if($result->num_rows > 0){
                    while($fila = $result->fetch_assoc()){
                        echo "<option value= '".$fila['id']."'>" . $fila['opcion'] . "</option>";
                    }
                }else{
                    echo "<option value='0'>No hay areas registradas</option>";
                }
                ?>
            
            <input id="enviar"  type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>