<!DOCTYPE html>
<html lang="es">

<head>
    <title>Subvenciones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <?php

    require './includes/config/database.php';

    // --------------- INICIO RECOGEMOS LOS DATOS DE LAS SUBVENCIONES Y LOS GUARDO EN $resultados -----------------

    $id_subvenciones = isset($_REQUEST['id_subvenciones']) ? $_REQUEST['id_subvenciones'] : null;

    if (isset($miPDO)) {
        $miConsulta = $miPDO->prepare("SELECT * FROM subvenciones WHERE id_subvenciones = :id_subvenciones");
        $miConsulta->bindParam(':id_subvenciones', $id_subvenciones, PDO::PARAM_INT);
        $miConsulta->execute();
        $resultados = $miConsulta->fetchAll();
        if ($resultados === false) {
            // Error en la consulta SQL
            die('<p class="m-3">Error en la consulta SQL');
        } else if (count($resultados) === 0) {
            // No se encontraron resultados
            die('<p class="m-3">No se encontraron resultados');
        }

        // Procesar $resultados aquí
    } else {
        // $miPDO no está definido
        die('<p class="m-3">Error de conexión a la base de datos');
    }

    // --------------- FIN RECOGEMOS LOS DATOS DE LAS SUBVENCIONES Y LOS GUARDO EN $resultados -----------------

    ?>

    <!-------------------------------- INICIO TABLA CON DATOS DE $resultados -----------------------------
    
Creamos la tabla con los campos de las series y despues un foreach para escribir las filas -->

    <div class="container-fluid mt-3">
        <h4>Importes relativos a la subvención</h4>
        <?php foreach ($resultados as $posicion => $columna) { ?>
            <h4><?php echo htmlentities($columna['descripcion_subvenciones'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h4>
        <?php } ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Cod.</th>
                        <th scope="col">Publicado</th>
                        <th scope="col">Solicitado</th>
                        <th scope="col">Proyecto</th>
                        <th scope="col">Concedido</th>
                        <th scope="col">Ingresado</th>
                        <th scope="col">Pagado</th>
                    </tr>
                </thead>

                <?php
                foreach ($resultados as $posicion => $columna) {
                    echo '<tr>';
                    echo '<td>' . htmlentities($columna['id_subvenciones'], ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</td>';
                    echo '<td>' . htmlentities($columna['descripcion_subvenciones'], ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</td>';
                    echo '<td>' . htmlentities($columna['importe_publicado'], ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</td>';
                    echo '<td>' . htmlentities($columna['importe_solicitado'], ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</td>';
                    echo '<td>' . htmlentities($columna['importe_proyecto'], ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</td>';
                    echo '<td>' . htmlentities($columna['importe_concedido'], ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</td>';
                    echo '<td>' . htmlentities($columna['importe_ingresado'], ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</td>';
                    echo '<td>' . htmlentities($columna['importe_pagado'], ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</td>';
                    echo '</tr>';
                }

                ?>

            </table>
        </div>

        <!----------------------------------------- FIN TABLA CON DATOS ------------------------------------->

        <div class="container-fluid">
            <form method="POST">
                <div class="form-group">
                    <a class="btn btn-warning mt-3 mb-3" href="./includes/templates/modificar_subvencion.php?id_subvenciones=<?= $columna['id_subvenciones'] ?>" role="button">Modificar subvención</a>
                    <a class="btn btn-success mt-3 mb-3" href="index.php" role="button">Ver subvenciones</a>
                </div>
            </form>
        </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>