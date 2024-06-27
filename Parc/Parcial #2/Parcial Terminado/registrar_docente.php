<!-- registrar_docente.php -->
<form action="registrar_docente.php" method="post">
    Cedula: <input type="text" name="cedula"><br>
    Nombre: <input type="text" name="nombre"><br>
    Apellido: <input type="text" name="apellido"><br>

    Facultad: <select name="facultad" id="facultad">
        <!-- Opciones se cargarán dinámicamente -->
        <option value="0">Seleccionar facultad</option>
        <?php
        include 'conexion.php';
        $query = "SELECT * FROM facultades_u_nacional";
        $result = $conexion->query($query);

        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                echo "<option value= '" . $fila['id'] . "'>" . $fila['opcion'] . "</option>";
            }
        } else {
            echo "<option value='0'>No hay facultades registradas</option>";
        }
        ?>
    </select><br>
    Departamento: <select name="departamento" id="departamento">
        <!-- Opciones se cargarán dinámicamente -->
        <option value="0">Seleccionar departamento</option>
        <?php
        if (isset($_GET['facultad_id'])) {
            // Obtener el id de la facultad seleccionada y convertirlo a entero
            $facultad_id = (int)$_GET['facultad'];
            $query = "SELECT * FROM departamento_u_nacional WHERE relacion = " . $facultad_id;
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                while ($fila = $result->fetch_assoc()) {
                    echo "<option value= '" . $fila['id'] . "'>" . $fila['opcion'] . "</option>";
                }
            } else {
                echo "<option value='0'>No hay departamentos registrados, Error</option>";
            }
        } else {
            echo "<option value='0'>No hay departamentos</option>";
        }
        ?>
    </select><br>
    Área: <select name="area" id="area">
        <!-- Opciones se cargarán dinámicamente -->
    </select><br>
    <input type="submit" value="Registrar">
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
    loadFacultades();

    document.getElementById('facultad').addEventListener('change', function() {
        loadDepartamentos(this.value);
    });

    document.getElementById('departamento').addEventListener('change', function() {
        loadAreas(this.value);
    });
});

function loadFacultades() {
    fetch('get_facultades.php')
        .then(response => response.json())
        .then(data => {
            let facultadSelect = document.getElementById('facultad');
            data.forEach(facultad => {
                let option = document.createElement('option');
                option.value = facultad.id;
                option.text = facultad.opcion;
                facultadSelect.add(option);
            });
        });
}

function loadDepartamentos(facultadId) {
    fetch('get_departamentos.php?facultad_id=' + facultadId)
        .then(response => response.json())
        .then(data => {
            let departamentoSelect = document.getElementById('departamento');
            departamentoSelect.innerHTML = '';
            data.forEach(departamento => {
                let option = document.createElement('option');
                option.value = departamento.id;
                option.text = departamento.opcion;
                departamentoSelect.add(option);
            });
        });
}

function loadAreas(departamentoId) {
    fetch('get_areas.php?departamento_id=' + departamentoId)
        .then(response => response.json())
        .then(data => {
            let areaSelect = document.getElementById('area');
            areaSelect.innerHTML = '';
            data.forEach(area => {
                let option = document.createElement('option');
                option.value = area.id;
                option.text = area.opcion;
                areaSelect.add(option);
            });
        });
}
</script>


<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $facultad = $_POST['facultad'];
    $departamento = $_POST['departamento'];
    $area = $_POST['area'];

    // Convertir los campos de texto a enteros
    $facultad = (int)$facultad;
    $departamento = (int)$departamento;
    $area = (int)$area;

    // Validar que los campos no estén vacíos y sean enteros
    if (!empty($cedula) && !empty($nombre) && !empty($apellido) && is_numeric($facultad) && is_numeric($departamento) && is_numeric($area)) {
        $sql = "INSERT INTO Docentes (cedula, nombre, apellido, facultad_id, departamento_id, area_id)
                VALUES ('$cedula', '$nombre', '$apellido', '$facultad', '$departamento', '$area')";

        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo docente registrado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        echo "Error: Por favor, complete todos los campos correctamente.";
    }

    $conexion->close();
}
?>
