<!DOCTYPE html>
<html lang="es">

<head>
    <title>Formulario para añadir subvenciones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

    <?php require '../../includes/config/database.php'?>
    <?php include '../../includes/funciones.php'?>

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

        if(insertar_subvencion($descripcion_subvenciones,$entidad_solicitada,$tipo_de_organismo,$importe_publicado,$feha_creacion, $miPDO)) {
            header("Location: ../../index.php");

        } else {
            echo "Error";
        }

        
    }

    ?>

    <div class="container">
        <form method="POST">
            <h2>Formulario para añadir una nueva subvención</h2>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" name="descripcion_subvenciones" placeholder="Descripción de la subvención" required>
            </div>
            <div class="row g-3">
                <div class="form-group">
                    <label class="form-label">Importe publicado</label>
                    <input type="number" name="importe_publicado" placeholder="Importe publicado de la subvención" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Fecha de creación</label>
                    <input type="date" name="fecha_creacion" required>
                </div><br>
                <div class="form-group">
                    <label class="form-label">Entidad que aporta la subvención</label>
                    <input type="text" name="entidad_solicitada" placeholder="Ingresa la entidad" required>
                </div>
                <select class="form-select" aria-label="Ingresa la entidad" name="tipo_de_organismo">
                    <option selected>Entidad que aporta la subvención</option>
                    <option value="Estatal">Estatal</option>
                    <option value="Junta">Junta</option>
                    <option value="Diputación">Diputación</option>
                    <option value="Otro">Otro</option>
                </select>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>