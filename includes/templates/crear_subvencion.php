<!DOCTYPE html>
<html lang="es">

<head>
    <title>Formulario para añadir subvenciones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">

    <?php require '../../includes/config/database.php' ?>
    <?php include '../../includes/funciones.php' ?>

</head>

<body>

    <?php
    // Comprobamos si recibimos datos por POST

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recogemos variables

        $descripcion_subvenciones = isset($_REQUEST['descripcion_subvenciones']) ? $_REQUEST['descripcion_subvenciones'] : null;
        $importe_publicado = isset($_REQUEST['importe_publicado']) ? $_REQUEST['importe_publicado'] : null;
        $fecha_creacion = isset($_REQUEST['fecha_creacion']) ? $_REQUEST['fecha_creacion'] : null;
        $entidad_solicitada = isset($_REQUEST['entidad_solicitada']) ? $_REQUEST['entidad_solicitada'] : null;
        $tipo_de_organismo = isset($_REQUEST['tipo_de_organismo']) ? $_REQUEST['tipo_de_organismo'] : null;

        insertar_subvencion($miPDO, $descripcion_subvenciones, $entidad_solicitada, $tipo_de_organismo, $importe_publicado, $feha_creacion);
        echo "<script type='text/javascript'>
        window.location.href = '../../index.php';
     </script>";
    }

    ?>

<div class="container my-5">
    <form method="POST">
        <h2 class="text-center my-5">Formulario para añadir una nueva subvención</h2>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="descripcion_subvenciones" name="descripcion_subvenciones" required>
            <label for="descripcion_subvenciones">Descripción</label>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="form-floating">
                    <input type="number" name="importe_publicado" id="importe_publicado" class="form-control" placeholder="Importe publicado de la subvención" required>
                    <label for="importe_publicado">Importe publicado</label>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="form-floating">
                    <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control" value="<?php echo date("Y-m-d");?>" required>
                    <label for="fecha_creacion">Fecha de creación</label>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-floating">
                    <input type="text" name="entidad_solicitada" id="entidad_solicitada" class="form-control" placeholder="Ingresa la entidad" required>
                    <label for="entidad_solicitada">Entidad que aporta la subvención</label>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-floating">
                    <select class="form-select" aria-label="Tipo de organismo" name="tipo_de_organismo" id="tipo_de_organismo" required>
                        <option selected disabled>Selecciona un tipo de organismo</option>
                        <option value="Estatal">Estatal</option>
                        <option value="Junta">Junta</option>
                        <option value="Diputación">Diputación</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="tipo_de_organismo">Tipo de organismo</label>
                </div>
            </div>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>