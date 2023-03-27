<?php

    // Variables

    $hostDB = 'cursosinfin.com';
    $nombreDB = 'doqxqqul_curfin';
    $usuarioDB = 'doqxqqul_admincurfin';
    $contrasenyaDB = 'curfin0808';

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