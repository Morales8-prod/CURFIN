<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Subvenciones</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- FUENTES DE GOOGLE -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"> -->
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
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

    <?php include 'includes/templates/nav.php' ?>

    <!--- BIENVENIDO ------>

    <div class="d-flex flex-column" id="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col">
                            <h1 class="text-center">Bienvenido al Panel de Control de Subvenciones</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Información General</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-3 mb-4">
                                            <div class="card shadow border-start-primary py-2">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col mr-2">
                                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Número de Subvenciones</span></div>
                                                            <div class="text-dark fw-bold h5 mb-0"><span>215</span></div>
                                                        </div>
                                                        <div class="col-auto"><i class="fas fa-chart-bar fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-3 mb-4">
                                            <div class="card shadow border-start-primary py-2">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col mr-2">
                                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Número de Proyectos</span></div>
                                                            <div class="text-dark fw-bold h5 mb-0"><span>102</span></div>
                                                        </div>
                                                        <div class="col-auto"><i class="fas fa-project-diagram fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-3 mb-4">
                                            <div class="card shadow border-start-primary py-2">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col mr-2">
                                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Subvenciones Aprobadas</span></div>
                                                            <div class="text-dark fw-bold h5 mb-0"><span>78</span></div>
                                                        </div>
                                                        <div class="col-auto"><i class="fas fa-thumbs-up fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-3 mb-4">
                                            <div class="card shadow border-start-primary py-2">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col mr-2">
                                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Subvenciones Denegadas</span></div>
                                                            <div class="text-dark fw-bold h5 mb-0"><span>25</span></div>
                                                        </div>
                                                        <div class="col-auto"><i class="fas fa-thumbs-down fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!----------------------------- INICIO BOTÓN AÑADIR SUBVENCIÓN Y BOTÓN VER PROYECTOS --------------------------------->

                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <form method="POST">
                                                        <div class="form-group">
                                                            <a class="btn btn-primary mt-3 mb-3" href="./includes/templates/crear_subvencion.php" role="button">Añadir subvención</a>
                                                            <a class="btn btn-success mt-3 mb-3" href="./proyectos/index.php" role="button">Ver proyectos</a>
                                                            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                                                                <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generar Informe</a>
                                                            </div>
                                                            <?php include 'includes/templates/buscar_subvencion.php';
                                                            if ($resultados_buscar) {
                                                                echo '<a class="btn btn-light border-dark mt-3 mb-3" href="./index.php" role="button">Limpiar pantalla</a>';
                                                            }; ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!---------------------------- FIN BOTÓN AÑADIR SUBVENCIÓN Y CAMPO BUSCAR SUBVENCIÓN ------------------------------>

                                            <!------------------------------------------- REQUIERO BASE DE DATOS ---------------------------------------------->

                                            <?php

                                            require 'includes/config/database.php';

                                            include 'includes/funciones.php';

                                            $resultados = mostrar_subvenciones($miPDO);


                                            // --------------- FIN RECOGEMOS LOS DATOS DE LAS SUBVENCIONES Y LOS GUARDO EN $resultados -----------------

                                            ?>

                                            <!------------------------------------ INICIO TABLA CON DATOS DE $resultados --------------------------------

Creamos la tabla con los campos de las subvenciones y despues un foreach para escribir las filas ----------->

                                            <div class="row">
                                                <div style="font-size:0.8rem" class="d-flex flex-wrap justify-content-between mb-3 fw-light">
                                                    <div><span style="color:#AAECFF">&#9632 <span class=text-dark>Estado subvención justificada </span></span></div>
                                                    <div><span style="color:#AAFFBE">&#9632 <span class=text-dark>Estado subvención definitiva </span></span></div>
                                                    <div><span class="text-danger">&#9632 <span class=text-dark>Plazo justificación subvención </span></span></div>
                                                    <div><span class="text-warning">&#9632 <span class=text-dark>Aviso presentar subvención </span></span></div>
                                                    <div><span class="text-dark">&#9632 <span class=text-dark>Aviso espera subvención </span></span></div>
                                                </div>
                                                <div class="container-fluid">
                                                    <div class="table-responsive">
                                                        <table id="tablaDinamica" class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th class="d-none col-1 bg-secondary text-light align-middle">Id. Sub.</th>
                                                                    <!-- <th class="col-1 bg-secondary text-light align-middle">Id. Proy.</th> -->
                                                                    <th class="col-4 col-lg-6 bg-secondary text-light align-middle">Descripción</th>
                                                                    <th class="d-none col-1 bg-secondary text-light text-center align-middle">Importe concedido</th>
                                                                    <th class="col-1 bg-secondary text-light text-center align-middle">Importe concedido</th>
                                                                    <th class="col-2 col-lg-2 bg-secondary text-light text-center align-middle">Organismo</th>
                                                                    <th class="col-1 bg-secondary text-light text-center align-middle">Estado</th>
                                                                    <th class="col-2 col-md-3 bg-secondary text-light text-center align-middle">Cambiar fase</th>
                                                                    <th class="col-1 bg-secondary text-light text-center align-middle">Acción</th>
                                                                    <th class="col-1 bg-secondary text-light text-center align-middle">Acción</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php foreach ($resultados as $posicion => $columna) { ?>
                                                                    <tr style='<?= color_estado($miPDO, $columna["id_subvenciones"]); ?>'>
                                                                        <td class="d-none align-middle"><?= $columna['id_subvenciones'] ?></td>
                                                                        <td class="align-middle p-0"><a class='<?= color_estado($miPDO, $columna["id_subvenciones"]) . ' '; ?> text-decoration-none' href='includes/templates/detalles_subvencion.php?id_subvenciones=<?= $columna["id_subvenciones"]; ?>'>
                                                                                <div class="p-2 text-dark"><?= $columna['descripcion_subvenciones'] ?></div>
                                                                            </a></td>
                                                                        <td class="d-none text-end align-middle"><?= $columna['importe_concedido'] ?></td>
                                                                        <td class="text-end align-middle"><?= $columna['ImporteConcedido_formt'] ?></td>
                                                                        <td class="text-center align-middle"><?= $columna['tipo_de_organismo'] ?></td>
                                                                        <td class="text-center align-middle"><?= $columna['estado_subvencion'] ?></td>
                                                                        <td class="align-middle">
                                                                            <form action="./includes/templates/estado_subvencion.php" method="GET">
                                                                                <div class="input-group">
                                                                                    <select class="form-control" aria-label="Estado de la subvencion" name="estado_subvencion" id="estado_subvencion" required>
                                                                                        <?php $estado_select = array_fases($miPDO, $columna['id_subvenciones']);
                                                                                        foreach ($estado_select as $fase) {
                                                                                            echo '<option value="' . $fase . '" >' . $fase . ' </option>';
                                                                                        } ?>
                                                                                    </select>
                                                                                    <span class="input-group-btn">
                                                                                        <input name="id_subvenciones" type="hidden" value='<?php echo $columna['id_subvenciones']; ?>' />
                                                                                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="bi bi-hand-thumbs-up-fill"></i></button>
                                                                                </div>
                                                                            </form>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <a class="btn btn-warning text-dark align-middle text-center" href="./includes/templates/modificar_subvencion.php?id_subvenciones=<?= $columna['id_subvenciones'] ?>" role="button"><i class="bi bi-pen"></i></a>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <a class="btn btn-danger align-middle text-center" href="./includes/templates/eliminar_subvencion.php?id_subvenciones=<?= $columna['id_subvenciones'] ?>" role="button"><i class="bi bi-trash"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!----------------------------------------------------------- INICIO FOOTER --------------------------------------------->

                                        <footer class="bg-white sticky-footer">
                                            <div class="container my-auto">
                                                <div class="text-center my-auto copyright">
                                                    <p>© <?php echo date('Y'); ?> Todos los derechos reservados</p>
                                                </div>
                                            </div>
                                        </footer>
                                    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
                                </div>
                                <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                                <script src="assets/js/chart.min.js"></script>
                                <script src="assets/js/bs-init.js"></script>
                                <script src="assets/js/theme.js"></script>
                                </footer>

                                <!----------------------------------------------------------- FIN FOOTER --------------------------------------------->


</body>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- DATA TABLE -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#tablaDinamica').DataTable({
            "order": [
                [0, "desc"]
            ],
            "lengthMenu": [
                [25, 50, 75, -1],
                [25, 50, 75, "Todo"]

            ],
            scrollY: true,
            scrollCollapse: true,
            paging: true,
            responsive: false,
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