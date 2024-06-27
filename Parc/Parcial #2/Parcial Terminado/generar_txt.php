<!-- generar_txt.php -->
<form action="generar_txt.php" method="get">
    Facultad: <select name="facultad" id="facultad">
        <!-- Opciones se cargarán dinámicamente -->
    </select><br>
    <input type="submit" value="Generar TXT">
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
    loadFacultades();
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
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['facultad'])) {
    include 'conexion.php';

    $facultad_id = $_GET['facultad'];
    $sql = "SELECT opcion AS departamento_nombre, opcion AS area_nombre 
            FROM departamento_u_nacional AS departamentos 
            JOIN areas_u_nacional ON departamentos.id = areas_u_nacional.relacion 
            WHERE departamentos.relacion = $facultad_id";
    $result = $conn->query($sql);

    $filename = "facultad_$facultad_id.txt";
    $file = fopen($filename, "w");

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            fwrite($file, "Departamento: ".$row["departamento_nombre"]." - Área: ".$row["area_nombre"]."\n");
        }
        fclose($file);

        echo "Archivo generado exitosamente. <a href='$filename' download>Descargar</a>";
    } else {
        echo "0 resultados";
    }

    $conn->close();
}
?>
