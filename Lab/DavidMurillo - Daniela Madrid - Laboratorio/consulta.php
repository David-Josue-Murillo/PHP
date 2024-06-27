<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root{
            color-scheme: light dark;
        }
    </style>
</head>
<body>
    <?php
    $cedula = $_POST['cedula'];

    //Matriz que almacenar todos los datos de los que estan en los archivos
    $datosCiencias = array();
    $datosCivica = array();
    $datosEspanol = array();
    $datosGeografia = array();
    $datosHistoria = array();
    $datosMatematicas = array();
    
    //Leer todos los archivos
    $ciencias = fopen("CIENCIAS.TXT", "r");
    $civica = fopen("CIVICA.TXT", "r");
    $espanol = fopen("ESPANOL.TXT", "r");
    $geografia = fopen("GEOGRAFIA.TXT", "r");
    $historia = fopen("HISTORIA.TXT", "r");
    $matematicas = fopen("MAT.TXT", "r");

    while(!feof($ciencias)){
        //Leer linea por linea
        $lineaCiencias = fgets($ciencias);
        $lineaCivica = fgets($civica);
        $lineaEspanol = fgets($espanol);
        $lineaGeografia = fgets($geografia);
        $lineaHistoria = fgets($historia);
        $lineaMatematicas = fgets($matematicas);

        //Separar los datos, los datos el archivo txt estan separados por un espacio en blanco
        $sepCiencias = explode(" ", $lineaCiencias);
        $sepCivica = explode(" ", $lineaCivica);
        $sepEspanol = explode(" ", $lineaEspanol);
        $sepGeografia = explode(" ", $lineaGeografia);
        $sepHistoria = explode(" ", $lineaHistoria);
        $sepMatematicas = explode(" ", $lineaMatematicas);


        //Almacenar los datos en la matriz
        $datosCiencias[] = $sepCiencias;
        $datosCivica[] = $sepCivica;
        $datosEspanol[] = $sepEspanol;
        $datosGeografia[] = $sepGeografia;
        $datosHistoria[] = $sepHistoria;
        $datosMatematicas[] = $sepMatematicas;
    }

    //Cerrar los archivos
    fclose($ciencias);
    fclose($civica);
    fclose($espanol);
    fclose($geografia);
    fclose($historia);
    fclose($matematicas);

    echo "<br>";

    //Buscar la cedula en los datos y mostrar el colegio, grupo, nombre y calificaciones de cada materia junto con su promedio final e indice final
    for($i = 2; $i < count($datosCiencias); $i++){
        if($datosCiencias[$i][1] == $cedula){
            $verificador = true;

            //Almacenar datos en un archivo txt
            $archivo = fopen("datos.txt", "w");
            fwrite($archivo, "Colegio: ".$datosCiencias[0][0]. " " .$datosCiencias[0][1]." " .$datosCiencias[0][2]." " .$datosCiencias[0][3] ."\n");
            fwrite($archivo, "Grupo: ".$datosCiencias[0][4]."\n");
            fwrite($archivo, "Estudiante: ".$datosCiencias[$i][5]."\n");
            fwrite($archivo, "--------------------------------\n\n");

            fwrite($archivo, "Matematica: ".$datosCiencias[$i][2]."\n");
            fwrite($archivo, "Ciencias: ".$datosCiencias[$i][2]."\n");
            fwrite($archivo, "Geografia: ".$datosCiencias[$i][3]."\n");
            fwrite($archivo, "Español: ".$datosCiencias[$i][2]."\n");
            fwrite($archivo, "Historia: ".$datosCiencias[$i][2]."\n");
            fwrite($archivo, "Civica: ".$datosCiencias[$i][2]."\n\n");

            echo "Colegio: ".$datosCiencias[0][0]. " " .$datosCiencias[0][1]." " .$datosCiencias[0][2]." " .$datosCiencias[0][3] ."<br>";
            echo "Grupo: ".$datosCiencias[0][4]."<br>";
            echo "Estudiante: ".$datosCiencias[$i][5]."<br><br>";

            $promedio = ($datosCiencias[$i][2] + $datosCiencias[$i][3] + $datosCiencias[$i][4]) / 3;

            fwrite($archivo, "Promedio: ".$promedio."\n");
            fclose($archivo);
            echo "<table border='1' >
                    <thead>
                        <tr>
                            <th>Materia</th>
                            <th>1T</th>
                            <th>2T</th>
                            <th>3T</th>
                            <th>P.FINAL</th>
                        </tr>
                    </thead>

                    <thbody>
                        <tr>
                            <td>Matematica</td>
                            <td>".$datosCiencias[$i][2]."</td>
                            <td>".$datosCiencias[$i][3]."</td>
                            <td>".$datosCiencias[$i][4]."</td>
                            <td>".$promedio."</td>
                        </tr>
                        <tr>
                            <td>Ciencias</td>
                            <td>".$datosCiencias[$i][2]."</td>
                            <td>".$datosCiencias[$i][3]."</td>
                            <td>".$datosCiencias[$i][4]."</td>
                            <td>".$promedio."</td>
                        </tr>
                        <tr>
                            <td>Geografia</td>
                            <td>".$datosCiencias[$i][2]."</td>
                            <td>".$datosCiencias[$i][3]."</td>
                            <td>".$datosCiencias[$i][4]."</td>
                            <td>".$promedio."</td>
                        </tr>
                        <tr>
                            <td>Español</td>
                            <td>".$datosCiencias[$i][2]."</td>
                            <td>".$datosCiencias[$i][3]."</td>
                            <td>".$datosCiencias[$i][4]."</td>
                            <td>".$promedio."</td>
                        </tr>
                        <tr>
                            <td>Historia</td>
                            <td>".$datosCiencias[$i][2]."</td>
                            <td>".$datosCiencias[$i][3]."</td>
                            <td>".$datosCiencias[$i][4]."</td>
                            <td>".$promedio."</td>
                        </tr>
                        <tr>
                            <td>Civica</td>
                            <td>".$datosCiencias[$i][2]."</td>
                            <td>".$datosCiencias[$i][3]."</td>
                            <td>".$datosCiencias[$i][4]."</td>
                            <td>".$promedio."</td>
                        </tr>
                    </thbody>
                <table />
            ";
           
            //Promedio final
            $promedioFinal = ($promedio + $promedio + $promedio + $promedio + $promedio + $promedio) / 6;
            echo "Indice: ".$promedioFinal."<br>";
        }
        
    }
    
    if(!$verificador){
        echo "<h2>La cedula no existe</h2>";
    }
    ?>
</body>
</html>