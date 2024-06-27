<!-- consulta_docentes.php -->
<form action="consulta_docentes.php" method="get">
    Facultad: <select name="facultad" id="facultad">
        <!-- Opciones se cargarán dinámicamente -->
    </select><br>
    Departamento: <select name="departamento" id="departamento">
        <!-- Opciones se cargarán dinámicamente -->
    </select><br>
    <input type="submit" value="Consultar">
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
    loadFacultades();

    document.getElementById('facultad').addEventListener('change', function() {
        loadDepartamentos(this.value);
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
                option.text = facultad.nombre;
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
                option.text = departamento.nombre;
                departamentoSelect.add(option);
            });
        });
}
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['departamento'])) {
    include 'conexion.php';

    $departamento_id = $_GET['departamento'];
    $sql = "SELECT nombre, apellido, (SELECT nombre FROM areas_u_nacional WHERE id = docentes.area_id) AS area_nombre 
            FROM docentes WHERE departamento = $departamento_id";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Área</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["nombre"]."</td>
                    <td>".$row["apellido"]."</td>
                    <td>".$row["area_nombre"]."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 resultados";
    }

    $conexion->close();
}
?>
