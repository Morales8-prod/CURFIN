<?php
$hostDB = "localhost";
    $nombreDB = "pruebasbucles";
    $usuarioDB = "root";
    $constrasenyaDB = "";

    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $constrasenyaDB);

?>