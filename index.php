<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Subvenciones</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- FUENTES DE GOOGLE -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <!-- DATA TABLE -->
    <link rel href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }
    </style>
</head>

<body id="page-top">

<?php include 'includes/templates/nav.php'?>

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Subvenciones</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generar Informe</a>
                    </div>
                    <div class="row">
                        <div class="container-fluid">
                            <form method="POST">
                                <div class="form-group">
                                    <a class="btn btn-primary mt-3 mb-3" href="./includes/templates/crear_subvencion.php" role="button">Añadir subvención</a>
                                    <a class="btn btn-success mt-3 mb-3" href="./proyectos/index.php" role="button">Ver proyectos</a>
                                    <?php include 'includes/templates/buscar_subvencion.php';
                                    if ($resultados_buscar) {
                                        echo '<a class="btn btn-light border-dark mt-3 mb-3" href="./index.php" role="button">Limpiar pantalla</a>';
                                    }; ?>
                                </div>
                            </form>
                        </div>
                        <!------------------------- FIN BOTÓN AÑADIR SUBVENCIÓN Y CAMPO BUSCAR SUBVENCIÓN ----------------------------->

                        <?php

                        require 'includes/config/database.php';

                        // ------------- INCIO RECOGEMOS LOS DATOS DE TODAS LAS SUBVENCIONES Y LOS GUARDO EN $resultados -----------

                        // Prepara SELECT

                        $miConsulta = $miPDO->prepare('SELECT * FROM subvenciones ORDER BY id_subvenciones ASC;');

                        //Ejecuta consulta

                        $miConsulta->execute();

                        $resultados = $miConsulta->fetchAll();

                        // --------------- FIN RECOGEMOS LOS DATOS DE LAS SUBVENCIONES Y LOS GUARDO EN $resultados -----------------

                        ?>

                        <!-------------------------------- INICIO TABLA CON DATOS DE $resultados -----------------------------
        
    Creamos la tabla con los campos de las series y despues un foreach para escribir las filas -->



                    </div>
                    <div class="row">
                        <div class="container-fluid">
                            <table id="tablaDinamica" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="col-1 bg-secondary text-light align-middle">Id. Sub.</th>
                                    <th class="col-1 bg-secondary text-light align-middle">Id. Proy.</th>
                                    <th class="col-7 bg-secondary text-light align-middle">Descripción</th>
                                    <th class="col-1 bg-secondary text-light text-center align-middle">Importes</th>
                                    <th class="col-1 bg-secondary text-light text-center align-middle">Fechas</th>
                                    <th class="col-4 bg-secondary text-light text-center align-middle d-none d-sm-table-cell">Acción</th>
                                    <th class="col-2 bg-secondary text-light text-center align-middle d-none d-sm-table-cell">Acción</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($resultados as $posicion => $columna) { ?>
                                    <tr>
                                        <td class="col-1 align-middle"><?= $columna['id_subvenciones'] ?></td>
                                        <td class="col-1 align-middle"><?= $columna['id_proyectos'] ?></td>
                                        <td class="align-middle"><?= $columna['descripcion_subvenciones'] ?></td>
                                        <td class="align-middle">
                                            <a class="btn btn-light" href="detalles_importes.php?id_subvenciones=<?= $columna['id_subvenciones'] ?>" role="button">
                                                Detalles
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-light" href="detalles_fechas.php?id_subvenciones=<?= $columna['id_subvenciones'] ?>" role="button">
                                                Detalles
                                            </a>
                                        </td>
                                        <td class="d-none d-sm-table-cell align-middle">
                                            <a class="btn btn-warning text-dark" href="./includes/templates/modificar_subvencion.php?id_subvenciones=<?= $columna['id_subvenciones'] ?>" role="button">
                                                Modificar
                                            </a>
                                        </td>
                                        <td class="d-none d-sm-table-cell align-middle">
                                            <a class="btn btn-danger" href="./includes/templates/eliminar_subvencion.php?id_subvenciones=<?= $columna['id_subvenciones'] ?>" role="button">
                                                Ocultar
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                
                            </table>

                        </div>

                    </div>

                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- DATA TABLE -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
    $('#tablaDinamica').DataTable();
});
</script>

</html>