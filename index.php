<?php

    # Llamando una API con curl
    const API_URL = "https://api.carsxe.com/v2/platedecoder?key=CARSXE_API_KEY&plate=7XER187&state=CA";
    // Inicializar una nueva sesión de curl; ch = curl handle
    $ch = curl_init(API_URL);
    // Indicar que queremos recibir el resultado de la petición y no mastrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Ejecutar la petición y guardamos el resultado
    $result = curl_exec($ch);
    // una alternativa seria usar file_get_contents
    // $result = file_get_contents(API_URL); // si solo queieres hacer un GET de una API
    $data = json_decode($result, true);
    // Cerrar la sesión de curl
    curl_close($ch);
    # Fin de la llamada a la API


    $name = "David";
    $edad = 20;
    $humano = true;
    $bool = $edad < 30;

    const nombre = 'David';
    define('IMAGEN', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png');
    $datos = "Hola me llamo $name Murillo y tengo $edad";

    $ternario = $bool 
        ? "<h4>Es estudiante de la universidad de Panamá</h4>" 
        :"<h4>Es profesor de la universidad de Panamá</h4>";

    $lista = match(true){
        $edad < 2     => "Eres un bebe",
        $edad < 12    => "Eres un niño",
        $edad < 18    => "Eres un adolescente",
        $edad === 18  => "Ya eres mayor de edad",
        $edad < 30    => "Eres un adulto joven",
        $edad < 60    => "Eres un adulto viejo",
        default       => "Eres un viejo que ya va a pelar el bollo",
    };

    $bestLanguages = ['PHP', 'JavaScript', 'Python', 'Java', 'C#', 'C++', 'Ruby', 'Go', 'Swift', 'Kotlin'];
    $bestLanguages[] = 'Rust';

    $diccionario = [
        'nombre' => 'David',
        'edad' => 20,
        'tamaño' => 1.65,
        'nacionalidad' => 'Panameño',
        'sexo' => 'Masculino',
    ];
?>




<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        justify-items: center;
        place-content: center;
    }

    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 200px;
    }
</style>




<img src="<?= IMAGEN ?>" alt="PHP Logo" width="200">
<h1> <?= $datos; ?> </h1>
<h2> <?= $lista; ?> </h2>


<?php if($edad > 18) : ?>
    <h3>Eres Mayor de edad</h3>
<?php elseif($edad < 18) : ?>
    <h3>Eres menor de edad</h3>
<?php endif; ?>


<?= $ternario; ?>

<h2>Los mejores programacion del mundo</h2>
<div class="container">
    <div>
        <ul>
            <?php foreach($bestLanguages as $key => $language) : ?>
                <li><?= $language ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div>
        <ul>
            <?php for($i = 0; $i < count($bestLanguages); $i++) : ?>
                <li><?= $bestLanguages[$i] ?></li>
            <?php endfor; ?>
        </ul>
    </div>
</div>

<h3>Nacionalidad: <?= $diccionario['nacionalidad'] ?><h3/>