<?php
    require_once '../../init.php';  //make sure this path is correct!
    require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';
    if (!securePage($_SERVER['PHP_SELF'])){die();}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Subvenciones</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- FUENTES DE GOOGLE -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <!-- DATA TABLE -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
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

    <!----------------------------- INCLUYO LA PLANTILLA DE NAVEGACIÓN SIDEBAR IZQUIERDA -------------------------------->

    <?php include '../includes/templates/nav.php' ?>

    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Configuración</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generar Informe</a>
        </div>
        <div class="row">
            <div class="container-fluid">
                <form method="POST">
                    <div class="form-group">
                        <a class="btn btn-success mt-3 mb-3" href="../index.php" role="button">Ver
                            subvenciones</a>
                        <?php include '../includes/funciones.php';
                        if ($resultados_buscar) {
                            echo '<a class="btn btn-light border-dark mt-3 mb-3" href="index.php" role="button">Limpiar pantalla</a>';
                        }; ?>
                    </div>
                </form>
            </div>


            <?php

            require '../includes/config/database.php';

            // ------------- INCIO RECOGEMOS LOS DATOS DE TODAS LAS CONFIGURACIONES  Y LOS GUARDO EN $resultados -----------

            $resultado = mostrar_configuracion($miPDO);

            // --------------- FIN RECOGEMOS LOS DATOS DE LAS CONFIGURACIONES  Y LOS GUARDO EN $resultados -----------------

            ?>

            <!-------------------------------- INICIO TABLA CON DATOS DE $resultados -----------------------------
        
    Creamos la tabla con los campos de las series y despues un foreach para escribir las filas -->



        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="table-responsive">
                    <table id="tablaDinamica" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="d-none col-3 bg-secondary text-light align-middle">Parámetro</th>
                                <th class="col-11 bg-secondary text-light align-middle">Descripción</th>
                                <th class="col-2 bg-secondary text-light text-center align-middle">Nº Días</th>
                                <th class="col-1 bg-secondary text-light text-center align-middle">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                                <?php foreach ($resultado as $posicion => $columna) : ?>
                                    <tr>
                                        <form METHOD="POST" action="modificar_configuracion.php?id=<?php echo $columna['id']; ?>">
                                            <td class="d-none col-3 align-middle">
                                                <?= $columna['parametro'] ?>
                                            </td>
                                            <td class="align-middle">
                                                <?= $columna['descripcion'] ?>
                                            </td>
                                            <td class="align-middle">
                                                <?php echo '<input type="text" class="form-control" value="' . $columna['valor'] . '"name="valor">'; ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php endforeach; ?>
                        </tbody>
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
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/theme.js"></script>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- DATA TABLE -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablaDinamica').DataTable({
            scrollY: true,
            scrollCollapse: true,
            paging: true,
            responsive: true,
            scrollX: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }

        });
    });
</script>

</html>