<!DOCTYPE html>
<html lang="es">

<head>
    <title>Detalles de la subvención</title>
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

    ?>

    <div class="container my5">
        <form method="POST">
            <h2 class="text-center m-5">Detalles de la subvención</h2>
            <div class="form-floating mb-3">
            <input type="text" readonly class="form-control" id="descripcion_subvenciones" name="descripcion_subvenciones" value="<?= isset($resultado['descripcion_subvenciones']) ? $resultado['descripcion_subvenciones'] : '' ?>" placeholder=" " required>
            <label for="descripcion_subvenciones">Descripción</label>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="form-floating">
                        <input type="number" readonly class="form-control" id="importe_publicado" name="importe_publicado" value="<?= isset($resultado['importe_publicado']) ? $resultado['importe_publicado'] : '' ?>" placeholder=" " required>
                        <label for="importe_publicado">Importe publicado</label>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="form-floating">
                        <input type="number" readonly class="form-control" id="importe_solicitado" name="importe_solicitado" value="<?= isset($resultado['importe_solicitado']) ? $resultado['importe_solicitado'] : '' ?>" placeholder=" " required>
                        <label for="importe_solicitado">Importe solicitado</label>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="form-floating">
                        <input type="number" readonly readonly class="form-control" id="importe_concedido" name="importe_concedido" value="<?= isset($resultado['importe_concedido']) ? $resultado['importe_concedido'] : '' ?>" placeholder=" " required>
                        <label for="importe_concedido">Importe concedido</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="form-floating">
                        <input type="number" readonly class="form-control" id="importe_ingresado" name="importe_ingresado" value="<?= isset($resultado['importe_ingresado']) ? $resultado['importe_ingresado'] : '' ?>" placeholder=" " required>
                        <label for="importe_ingresado">Importe ingresado</label>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="form-floating">
                        <input type="number" readonly class="form-control" id="importe_pagado" name="importe_pagado" value="<?= isset($resultado['importe_pagado']) ? $resultado['importe_pagado'] : '' ?>" placeholder=" " required>
                        <label for="importe_pagado">Importe pagado</label>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-4 col-6">
                    <label for="fecha_creacion"  class="form-label">Fecha creación</label>
                    <input type="text" readonly`id="fecha_creacion" name="fecha_creacion" value="<?= isset($resultado['fecha_creacion']) ? $resultado['fecha_creacion'] : '' ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="fecha_planteada"  class="form-label">Fecha planteada</label>
                    <input type="text" readonly id="fecha_planteada" name="fecha_planteada" value="<?= isset($resultado['fecha_planteada']) ? $resultado['fecha_planteada'] : '' ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="fecha_presentada"  class="form-label">Fecha presentada</label>
                    <input type="text" readonly id="fecha_presentada" name="fecha_presentada" value="<?= isset($resultado['fecha_presentada']) ? $resultado['fecha_presentada'] : '' ?>" class="form-control">
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-4 col-6">
                    <label for="fecha_provisional"  class="form-label">Fecha provisional</label>
                    <input type="text" readonly id="fecha_provisional" name="fecha_provisional" value="<?= isset($resultado['fecha_provisional']) ? $resultado['fecha_provisional'] : '' ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="fecha_definitiva"  class="form-label">Fecha definitiva</label>
                    <input type="text" readonly id="fecha_definitiva" name="fecha_definitiva" value="<?= isset($resultado['fecha_definitiva']) ? $resultado['fecha_definitiva'] : '' ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="fecha_justificada" class="form-label">Fecha justificada</label>
                    <input type="text" readonly id="fecha_justificada" name="fecha_justificada" value="<?= isset($resultado['fecha_justificada']) ? $resultado['fecha_justificada'] : '' ?>" class="form-control">
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-4 col-6">
                    <label for="fecha_ingreso"  class="form-label">Fecha ingreso</label>
                    <input type="text" readonly id="fecha_ingreso" name="fecha_ingreso" value="<?= isset($resultado['fecha_ingreso']) ? $resultado['fecha_ingreso'] : '' ?>" class="form-control">
                </div>
            <div class="row g-3 mt-3">
                <div class="col-md-4 col-6">
                    <label for="entidad_solicitada"  class="form-label">Entidad solicitada</label>
                    <input type="text" readonly id="entidad_solicitada" name="entidad_solicitada" value="<?= isset($resultado['entidad_solicitada']) ? $resultado['entidad_solicitada'] : '' ?>" class="form-control">
                </div>
                <div class="col-md-4 col-6">
                    <label for="tipo_entidad"  class="form-label">Tipo de entidad</label>
                    <input type="text" readonly id="tipo_entidad" name="tipo_entidad" value="<?= isset($resultado['tipo_entidad']) ? $resultado['tipo_entidad'] : '' ?>" class="form-control">
                </div>
                <div class="row g-3 mt-3">
                </div>
                <div class="d-grid">
                <button type="submit" class="btn btn-success mb-3">volver</button>
                </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>