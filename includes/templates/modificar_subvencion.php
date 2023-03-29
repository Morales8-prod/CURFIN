<!DOCTYPE html>
<html lang="es">

<head>
    <title>Formulario para actualizar subvenciones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <?php

    require '../../includes/config/database.php';

    include '../../includes/funciones.php';

    //Rescatamos datos de la subvención mediante el código

    $id_subvenciones = isset($_REQUEST['id_subvenciones']) ? $_REQUEST['id_subvenciones'] : null;

    $resultado = mostrar_subvencion($miPDO, $id_subvenciones);

    // Comprobamos si recibimos datos por POST

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recogemos variables

        $descripcion_subvenciones = isset($_REQUEST['descripcion_subvenciones']) ? $_REQUEST['descripcion_subvenciones'] : null;
        $entidad_solicitada = isset($_REQUEST['entidad_solicitada']) ? $_REQUEST['entidad_solicitada'] : null;
        $tipo_de_organismo = isset($_REQUEST['tipo_de_organismo']) ? $_REQUEST['tipo_de_organismo'] : null;
        $importe_publicado = isset($_REQUEST['importe_publicado']) ? $_REQUEST['importe_publicado'] : null;
        $tipo_entidad = isset($_REQUEST['tipo_entidad']) ? $_REQUEST['tipo_entidad'] : null;
        $id_proyectos = isset($_REQUEST['id_proyectos']) ? $_REQUEST['id_proyectos'] : null;
        $fecha_creacion = isset($_REQUEST['fecha_creacion']) ? $_REQUEST['fecha_creacion'] : null;
        $fecha_planteada = isset($_REQUEST['fecha_planteada']) ? $_REQUEST['fecha_planteada'] : null;
        $fecha_presentada = isset($_REQUEST['fecha_presentada']) ? $_REQUEST['fecha_presentada'] : null;
        $fecha_provisional = isset($_REQUEST['fecha_provisional']) ? $_REQUEST['fecha_provisional'] : null;
        $fecha_definitiva = isset($_REQUEST['fecha_definitiva']) ? $_REQUEST['fecha_definitiva'] : null;
        $fecha_justificada = isset($_REQUEST['fecha_justificada']) ? $_REQUEST['fecha_justificada'] : null;
        $fecha_ingreso = isset($_REQUEST['fecha_ingreso']) ? $_REQUEST['fecha_ingreso'] : null;
        $importe_solicitado = isset($_REQUEST['importe_solicitado']) ? $_REQUEST['importe_solicitado'] : null;
        $importe_proyecto = isset($_REQUEST['importe_proyecto']) ? $_REQUEST['importe_proyecto'] : null;
        $importe_concedido = isset($_REQUEST['importe_concedido']) ? $_REQUEST['importe_concedido'] : null;
        $importe_ingresado = isset($_REQUEST['importe_ingresado']) ? $_REQUEST['importe_ingresado'] : null;
        $importe_pagado = isset($_REQUEST['importe_pagado']) ? $_REQUEST['importe_pagado'] : null;

        // Funcion para modificar subvenciones

        modificar_subvenciones($miPDO,$id_subvenciones, $descripcion_subvenciones, $entidad_solicitada, $tipo_de_organismo, $importe_publicado, $tipo_entidad,$id_proyectos, $fecha_creacion,$fecha_planteada, $fecha_presentada, $fecha_provisional, $fecha_definitiva, $fecha_justificada, $fecha_ingreso, $importe_solicitado, $importe_proyecto, $importe_concedido, $importe_ingresado, $importe_pagado);

        echo "<script type='text/javascript'>
        window.location.href = '../../index.php';
     </script>";
    }

    ?>

    <div class="container my5">
        <form method="POST">
            <h2 class="text-center m-5">Formulario para modificar la subvención</h2>
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="descripcion_subvenciones" name="descripcion_subvenciones" value="<?= $resultado['descripcion_subvenciones'] ?>" placeholder=" " required>
            <label for="descripcion_subvenciones">Descripción</label>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="importe_publicado" name="importe_publicado" value="<?= $resultado['importe_publicado'] ?>" placeholder=" " required>
                        <label for="importe_publicado">Importe publicado</label>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="importe_solicitado" name="importe_solicitado" value="<?= $resultado['importe_solicitado'] ?>" placeholder=" " required>
                        <label for="importe_solicitado">Importe solicitado</label>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="importe_concedido" name="importe_concedido" value="<?= $resultado['importe_concedido'] ?>" placeholder=" " required>
                        <label for="importe_concedido">Importe concedido</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="importe_ingresado" name="importe_ingresado" value="<?= $resultado['importe_ingresado'] ?>" placeholder=" " required>
                        <label for="importe_ingresado">Importe ingresado</label>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="importe_pagado" name="importe_pagado" value="<?= $resultado['importe_pagado'] ?>" placeholder=" " required>
                        <label for="importe_pagado">Importe pagado</label>
                    </div>
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
            <div class="row g-3 mt-3">
                <div class="col-md-4 col-6">
                    <label for="entidad_solicitada" class="form-label">Entidad solicitada</label>
                    <input type="text" id="entidad_solicitada" name="entidad_solicitada" value="<?= $resultado['entidad_solicitada'] ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="tipo_entidad" class="form-label">Tipo de entidad</label>
                    <input type="text" id="tipo_entidad" name="tipo_entidad" value="<?= $resultado['tipo_entidad'] ?>" class="form-control">
                </div>
                <div class="row g-3 mt-3">
                </div>
                <div class="d-grid">
                <button type="submit" class="btn btn-success mb-3">Modificar</button>
                </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>