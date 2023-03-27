<!DOCTYPE html>
<html lang="es">

<head>
    <title>Formulario para actualizar subvenciones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

</head>

<body>

    <?php

    require '../../includes/config/database.php';

    //Rescatamos datos del libro mediante el código

    $id_serie = isset($_REQUEST['id_serie']) ? $_REQUEST['id_serie'] : null;
    $nota = isset($_REQUEST['nota']) ? $_REQUEST['nota'] : null;

    // Prepara SELECT

    $miConsulta = $miPDO->prepare("SELECT * FROM series WHERE id_serie = $id_serie");

    $miConsulta->execute();

    $resultado = $miConsulta->fetch();

    // Comprobamos si recibimos datos por POST

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recogemos variables

        $titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
        $nota = isset($_REQUEST['nota']) ? $_REQUEST['nota'] : null;

        // Prepara SELECT

        $miConsulta = $miPDO->prepare("UPDATE series SET titulo = '$titulo' , nota = $nota WHERE id_serie = $id_serie;");

        //Ejecuta consulta

        $miConsulta->execute();

        header("Location: ../../index.php");
    }

    ?>

    <div class="container">
        <form method="POST">
            <h2>Formulario para modificar la subvención</h2>
            <div class="mb-3">
                <label for="titulo" class="form-label">Descripción</label>
                <input type="text" id="titulo" name="titulo" value="<?= $resultado['titulo'] ?>" class="form-control">
            </div>
            <div class="row g-3">
                <div class="col-md-4 col-6">
                    <label for="importe_publicado" class="form-label">Importe publicado</label>
                    <input type="number" id="importe_publicado" name="importe_publicado" value="<?= $resultado['importe_publicado'] ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="importe_solicitado" class="form-label">Importe solicitado</label>
                    <input type="number" id="importe_solicitado" name="importe_solicitado" value="<?= $resultado['importe_solicitado'] ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="importe_concedido" class="form-label">Importe concedido</label>
                    <input type="number" id="importe_concedido" name="importe_concedido" value="<?= $resultado['importe_concedido'] ?>" class="form-control">
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-4 col-6">
                    <label for="importe_ingresado" class="form-label">Importe ingresado</label>
                    <input type="number" id="importe_ingresado" name="importe_ingresado" value="<?= $resultado['importe_ingresado'] ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="importe_pagado" class="form-label">Importe pagado</label>
                    <input type="number" id="importe_pagado" name="importe_pagado" value="<?= $resultado['importe_pagado'] ?>" class="form-control">
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-4 col-6">
                    <label for="fecha_creacion" class="form-label">Fecha creación</label>
                    <input type="date" id="fecha_creacion" name="fecha_creacion" value="<?= $resultado['fecha_creacion'] ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="fecha_planteada" class="form-label">Fecha planteada</label>
                    <input type="date" id="fecha_planteada" name="fecha_planteada" value="<?= $resultado['fecha_planteada'] ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="fecha_presentada" class="form-label">Fecha presentada</label>
                    <input type="date" id="fecha_presentada" name="fecha_presentada" value="<?= $resultado['fecha_presentada'] ?>" class="form-control">
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-4 col-6">
                    <label for="fecha_provisional" class="form-label">Fecha provisional</label>
                    <input type="date" id="fecha_provisional" name="fecha_provisional" value="<?= $resultado['fecha_provisional'] ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="fecha_definitiva" class="form-label">Fecha definitiva</label>
                    <input type="date" id="fecha_definitiva" name="fecha_definitiva" value="<?= $resultado['fecha_definitiva'] ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="fecha_justificada" class="form-label">Fecha justificada</label>
                    <input type="date" id="fecha_justificada" name="fecha_justificada" value="<?= $resultado['fecha_justificada'] ?>" class="form-control">
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-4 col-6">
                    <label for="fecha_ingreso" class="form-label">Fecha ingreso</label>
                    <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="<?= $resultado['fecha_ingreso'] ?>" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-3">Modificar</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>