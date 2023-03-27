<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion con la base de datos Ejemplo</title>
</head>

<body>

    <?php

    // Variables

    $hostDB = 'localhost';
    $nombreDB = 'ejemplo';
    $usuarioDB = 'root';
    $contrasenyaDB = '';

    // Conecta con la base de datos

    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

    // Estado de la conexión

    // if ($miPDO == NULL) {
    //     echo "Conexión erronea";
    // } else {
    //     echo "<strong>" . "Conexión correcta" . "</strong>" . "<br>";
    // }

    ?>

</body>

</html>