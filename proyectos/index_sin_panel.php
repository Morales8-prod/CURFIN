<!DOCTYPE html>
<html lang="es">

<head>
    <title>Subvenciones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

<img src="../assets/img/logo_ayto_mengibar.png" class="img-fluid" alt="Logotipo Ayuntamiento de Mengíbar">

    <!------------------------ INICIO BOTÓN AÑADIR PROYECTOS ----------------------------
            
    Creamos la tabla con los campos de las series y despues un foreach para escribir las filas ---------->

    <div class="container-fluid">
        <form method="POST">
            <div class="form-group">
                <a class="btn btn-primary mt-3 mb-3" href="./crear.php" role="button">Añadir proyecto</a>
                <a class="btn btn-success mt-3 mb-3" href="../index.php" role="button">Ver subvenciones</a>
                <input class="col-3 form-control" type="text" name="buscar" placeholder="Proyecto...">
                <button type="submit" class="btn btn-light border-dark">Buscar</button>
                <a class="btn btn-light border-dark mt-3 mb-3" href="./index.php" role="button">Limpiar pantalla</a>
            </div>
        </form>
    </div>

    <!------------------------- FIN BOTÓN AÑADIR PROYECTOS Y CAMPO BUSCAR PROYECTOS ----------------------------->

    <?php

    // Inicializar la variable de resultados de búsqueda
    $resultados_buscar = [];

    // Comprobar si se reciben datos por POST para buscar una subvención
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recoger variables y validar la entrada
        $buscar = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);
        $id_serie = filter_input(INPUT_POST, 'id_serie', FILTER_VALIDATE_INT);

        if (!$buscar) {
            die('Error: El término de búsqueda no es válido.');
        }

        // Conectar a la base de datos
        require './includes/config/database.php';

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

    // Si se inicia la búsqueda, mostrar los resultados
    if ($resultados_buscar) {
        echo '<div class="container-fluid">';
        echo '<h6>Resultado de la búsqueda:</h6>';
        echo '<table class="table table-bordered table-hover text-dark">';
        echo '<thead class="bg-secondary text-light">';
        echo '<tr>';
        echo '<th class="col-9 align-middle">Descripción</th>';
        echo '<th class="col-1 align-middle">Importe</th>';
        echo '<th class="col-1 align-middle">Acción</th>';
        echo '<th class="col-1 align-middle">Acción</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($resultados_buscar as $posicion => $columna_resultados) {
            echo '<tr>';
            echo '<td class="col-9 align-middle">' . htmlspecialchars($columna_resultados['titulo'], ENT_QUOTES) . '</td>';
            echo '<td class="col-1 align-middle">' . htmlspecialchars($columna_resultados['nota'], ENT_QUOTES) . '</td>';
            echo '<td class="col-1 align-middle"><a class="btn btn-warning text-dark" href="./modificar.php?id_serie=' . htmlspecialchars($columna_resultados['id_serie'], ENT_QUOTES) . '" role="button">Modificar</a></td>';
            echo '<td class="col-1 align-middle"><a class="btn btn-danger" href="./eliminar.php?id_serie=' . htmlspecialchars($columna_resultados['id_serie'], ENT_QUOTES) . '" role="button">Eliminar</a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '<hr>';
    }

    require './includes/config/database.php';

    // ------------- INCIO RECOGEMOS LOS DATOS DE TODAS LOS PROYECTOS Y LOS GUARDO EN $resultados -----------

    // Prepara SELECT

    $miConsulta = $miPDO->prepare('SELECT * FROM series ORDER BY id_serie ASC;');

    //Ejecuta consulta

    $miConsulta->execute();

    $resultados = $miConsulta->fetchAll();

    // --------------- FIN RECOGEMOS LOS DATOS DE LOS PROYECTOS Y LOS GUARDO EN $resultados -----------------

    ?>

    <!-------------------------------- INICIO TABLA CON DATOS DE $resultados -----------------------------
        
    Creamos la tabla con los campos de las series y despues un foreach para escribir las filas -->

    <div class="container-fluid">
        <h4>Proyectos</h4>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th class="col-1 bg-secondary text-light align-middle">Id. Sub.</th>
                <th class="col-1 bg-secondary text-light align-middle">Id. Proy.</th>
                <th class="col-7 bg-secondary text-light align-middle">Descripción</th>
                <th class="col-1 bg-secondary text-light text-center align-middle">Importe</th>
                <th class="col-1 bg-secondary text-light text-center d-none d-sm-table-cell align-middle">Acción</th>
                <th class="col-1 bg-secondary text-light text-center d-none d-sm-table-cell align-middle">Acción</th>
            </tr>

            <?php foreach ($resultados as $posicion => $columna) : ?>
                <tr>
                    <td class="col-1 align-middle"><?= $columna['id_serie'] ?></td>
                    <td class="col-1 align-middle"><?= $columna['id_serie'] ?></td>
                    <td class="col-7 align-middle"><?= $columna['titulo'] ?></td>
                    <td class="col-1 align-middle"><?= $columna['nota'] ?></td>
                    <td class="d-none d-sm-table-cell align-middle">
                        <a class="btn btn-warning text-dark" href="./modificar.php?id_serie=<?= $columna['id_serie'] ?>" role="button">Modificar</a>
                    </td>
                    <td class="d-none d-sm-table-cell align-middle">
                        <a class="btn btn-danger" href="./eliminar.php?id_serie=<?= $columna['id_serie'] ?>" role="button">Ocultar</a>
                    </td>
                </tr>
            <?php endforeach; ?>


        </table>

    </div>

    <!----------------------------------------- FIN TABLA CON DATOS ------------------------------------->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>