<?php

// Inicializar la variable de resultados de búsqueda
$resultados_buscar = [];

// Comprobar si se reciben datos por POST para buscar una subvención
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger variables y validar la entrada
    $buscar = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);
    $id_serie = filter_input(INPUT_POST, 'id_serie', FILTER_VALIDATE_INT);

    if (!$buscar) {
        die('<p class="m-3">Error: El término de búsqueda no es válido.</p>');
    }

    // Conectar a la base de datos
    require 'includes/config/database.php';

    // Preparar la consulta con valores vinculados
    $miConsulta = $miPDO->prepare("SELECT * FROM series WHERE titulo LIKE :buscar");
    $miConsulta->bindValue(':buscar', "%$buscar%", PDO::PARAM_STR);

    // Ejecutar la consulta y manejar los errores
    try {
        $miConsulta->execute();
        $resultados_buscar = $miConsulta->fetchAll();
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}

// ------------------------------ INICIO CONDICIONAL BUSQUEDA SUBVENCIÓN ----------------------------------

// Si se inicia la búsqueda, se muestra el resultado
if ($resultados_buscar) {
    echo '<div class="container-fluid">';
    echo '<h6>Resultado de la búsqueda:</h6>';
    echo '<table class="table table-bordered table-hover text-dark">';
    echo '<thead class="bg-secondary text-light">';
    echo '<tr>';
    echo '<th class="col-1 align-middle">Id. Sub.</th>';
    echo '<th class="col-1 align-middle">Id. Proy.</th>';
    echo '<th class="col-7 align-middle">Descripción</th>';
    echo '<th class="col-1 align-middle text-center">Importes</th>';
    echo '<th class="col-1 align-middle text-center">Fechas</th>';
    echo '<th class="col-1 align-middle text-center">Acción</th>';
    echo '<th class="col-1 align-middle text-center">Acción</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($resultados_buscar as $columna_resultados) {
        echo '<tr>';
        echo '<td class="col-1 align-middle">' . htmlspecialchars($columna_resultados['id_serie'], ENT_QUOTES, 'UTF-8') . '</td>';
        echo '<td class="col-1 align-middle">' . htmlspecialchars($columna_resultados['id_serie'], ENT_QUOTES, 'UTF-8') . '</td>';
        echo '<td class="align-middle">' . htmlspecialchars($columna_resultados['titulo'], ENT_QUOTES, 'UTF-8') . '</td>';
        echo '<td><a class="btn btn-light" href="./detalles_importes.php?id_serie=' . htmlspecialchars($columna_resultados['id_serie'], ENT_QUOTES, 'UTF-8') . '" role="button">Detalles</a></td>';
        echo '<td><a class="btn btn-light" href="./detalles_fechas.php?id_serie=' . htmlspecialchars($columna_resultados['id_serie'], ENT_QUOTES, 'UTF-8') . '" role="button">Detalles</a></td>';
        echo '<td class="col-1"><a class="btn btn-warning text-dark" href="includes/templates/modificar_subvencion.php?id_serie=' . htmlspecialchars($columna_resultados['id_serie'], ENT_QUOTES, 'UTF-8') . '" role="button">Modificar</a></td>';
        echo '<td class="col-1"><a class="btn btn-danger" href="includes/templates/eliminar_subvencion.php?id_serie=' . htmlspecialchars($columna_resultados['id_serie'], ENT_QUOTES, 'UTF-8') . '" role="button">Eliminar</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

    // FIN CONDICIONAL BUSQUEDA SUBVENCIÓN
