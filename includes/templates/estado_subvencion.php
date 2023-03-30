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

    $estado_subvencion = isset($_REQUEST['estado_subvencion']) ? $_REQUEST['estado_subvencion'] : null;

    $resultado = mostrar_subvencion($miPDO, $id_subvenciones);

    if($estado_subvencion == "Planteada"){
        cambiar_fase_planteada($miPDO,$id_subvenciones);
        echo "<script type='text/javascript'>
window.location.href = '../../index.php';
</script>";

    }
            


    // Comprobamos si recibimos datos por POST

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $resultado = mostrar_subvencion($miPDO, $id_subvenciones);

        // Recogemos variables

        $fecha_presentada = isset($_REQUEST['fecha_presentada']) ? $_REQUEST['fecha_presentada'] : null;
        $fecha_provisional  = isset($_REQUEST['fecha_provisional']) ? $_REQUEST['fecha_provisional'] : null;
        $importe_solicitado = isset($_REQUEST['importe_solicitado']) ? $_REQUEST['importe_solicitado'] : null;
        $expediente_gestion = isset($_REQUEST['expediente_gestion']) ? $_REQUEST['expediente_gestion'] : null;
        $importe_concedido = isset($_REQUEST['importe_concedido']) ? $_REQUEST['importe_concedido'] : null;
        $importe_justificada = isset($_REQUEST['importe_justificada']) ? $_REQUEST['importe_justificada'] : null;
        $fecha_justificada = isset($_REQUEST['fecha_justificada']) ? $_REQUEST['fecha_justificada'] : null;
        $fecha_justificacion = isset($_REQUEST['fecha_justificacion']) ? $_REQUEST['fecha_justificacion'] : null;
        $fecha_definitiva = isset($_REQUEST['fecha_definitiva']) ? $_REQUEST['fecha_definitiva'] : null;

        switch($estado_subvencion){

            case "Presentada":

                cambio_fase_presentada($miPDO,$fecha_presentada,$importe_solicitado,$expediente_gestion,$id_subvenciones);

                echo "<script type='text/javascript'>
                window.location.href = '../../index.php';
                </script>";
            
            break;

            case "Provisional":
                cambiar_fase_provisional($miPDO,$id_subvenciones,$importe_concedido,$fecha_provisional);
                 

                echo "<script type='text/javascript'>
                window.location.href = '../../index.php';
                </script>";

            break;

            case "Definitiva":

                cambio_fase_definitiva($miPDO,$importe_concedido,$fecha_justificacion,$id_subvenciones,$fecha_definitiva);
   

                echo "<script type='text/javascript'>
                window.location.href = '../../index.php';
                </script>";

            break;

            case "Justificada":

                cambiar_fase_justificada($miPDO,$id_subvenciones,$fecha_justificada);

                echo "<script type='text/javascript'>
                window.location.href = '../../index.php';
                </script>";

            break;

        }


        // Funcion para modificar subvenciones

        modificar_subvenciones($miPDO, $id_subvenciones, $descripcion_subvenciones, $entidad_solicitada, $tipo_de_organismo, $importe_publicado, $tipo_entidad, $id_proyectos, $fecha_creacion, $fecha_planteada, $fecha_presentada, $fecha_provisional, $fecha_definitiva, $fecha_justificada, $fecha_ingreso, $importe_solicitado, $importe_proyecto, $importe_concedido, $importe_ingresado, $importe_pagado);

        echo "<script type='text/javascript'>
        window.location.href = '../../index.php';
     </script>";
    }

    ?>

    <div class="container my5">

     <!-- formulario presentada -->
    <?php 
    switch($estado_subvencion){


            case "Presentada":
        echo '
        
        <form method="POST">
            <h2 class="text-center m-5">Presentada</h2>


            <div class="row g-3 mt-3">

                <div class="col-md-4 col-6">
                    <label for="fecha_presentada" class="form-label">Fecha presentada</label>
                    <input type="date" id="fecha_presentacion" name="fecha_presentada" class="form-control" required>
                </div>

                <div class="col-md-4 col-6">
                    <label for="importe_solicitada" class="form-label">Importe solicitado</label>
                    <input type="number" id="importe_solicitado"  name="importe_solicitado"  class="form-control" required>
                </div>
                <div class="col-md-4 col-6">
                    <label for="expediente_gestion" class="form-label">Expediente gestiona</label>
                    <input type="text" id="expediente_gestion" name="expediente_gestion" class="form-control">
                </div>
                <div class="row g-3 mt-3">
                </div>
                <div class="d-grid">
                <button type="submit" class="btn btn-success mb-3">Modificar</button>
                </div>
            </div>
        </form>
        ';

            break;

            case "Provisional":

        echo '

        <form method="POST">
                <h2 class="text-center m-5">Provisional</h2>
    
    
                <div class="row g-3 mt-3">
    
                    <div class="col-md-4 col-6">
                        <label for="importe_concedido" class="form-label">Importe concedido</label>
                        <input type="number" id="importe_concedido"  name="importe_concedido"  class="form-control" required>
                    </div>
    
                    <div class="col-md-4 col-6">
                        <label for="fecha_provisional" class="form-label">Fecha provisional</label>
                        <input type="date" id="fecha_provisional" name="fecha_provisional"  class="form-control" required>
                    </div>
    
                    <div class="row g-3 mt-3">
                    </div>
                    <div class="d-grid">
                    <button type="submit" class="btn btn-success mb-3">Modificar</button>
                    </div>
                </div>
        </form>
        
        ';
                break;

                case "Definitiva":

            echo ' 
            
            <form method="POST">
            <h2 class="text-center m-5">Definitiva</h2>


            <div class="row g-3 mt-3">

                <div class="col-md-4 col-6">
                    <label for="fecha_justificacion" class="form-label">Fecha justificación</label>
                    <input type="date" id="fecha_justificacion" name="fecha_justificacion"  class="form-control" required>
                </div>

                <div class="col-md-4 col-6">
                    <label for="importe_concedido" class="form-label">Importe concedido</label>
                    <input type="number" id="importe_concedido"  name="importe_concedido"  class="form-control" required>
                </div>

                <div class="col-md-4 col-6">
                    <label for="fecha_definitiva" class="form-label">Fecha definitiva</label>
                    <input type="date" id="fecha_definitiva" name="fecha_definitiva" class="form-control" required>
                </div>


                <div class="row g-3 mt-3">
                </div>

                <div class="d-grid">
                <button type="submit" class="btn btn-success mb-3">Modificar</button>
                </div>
            
             </div> 
        </form> 

            ';
            break;

        case "Justificada":

            echo'

            <form method="POST">
            <h2 class="text-center m-5">Justificada</h2>


            <div class="row g-3 mt-3">

                <div class="col-md-4 col-6">
                    <label for="fecha_justificada" class="form-label">Fecha justificada</label>
                    <input type="date" id="fecha_justificada" name="fecha_justificada" class="form-control" required>
                </div>

                <div class="row g-3 mt-3">
                </div>

                <div class="d-grid">
                <button type="submit" class="btn btn-success mb-3">Modificar</button>
                </div>
            
             </div> 
        </form> 

            ';

            break;

    }

?>

    
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>