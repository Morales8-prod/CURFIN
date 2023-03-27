<?php

require '../../includes/config/database.php';

$id_serie = isset($_REQUEST['id_serie']) ? $_REQUEST['id_serie'] : null;

// Prepara DELETE para eliminar una fila

$miConsulta = $miPDO->prepare("DELETE FROM series WHERE id_serie = $id_serie");

// Prepara ALTER TABLE para conseguir que el AUTO_INCREMENT ponga el número correspondiente

$miConsulta2 = $miPDO->prepare("ALTER TABLE series AUTO_INCREMENT = 1");

//Ejecuta consultas

$miConsulta->execute();

$miConsulta2->execute();

header("Location: ../../index.php");
