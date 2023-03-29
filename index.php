<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Subvenciones</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- FUENTES DE GOOGLE -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
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

    <!----------------------------- INICIO BOTÓN AÑADIR SUBVENCIÓN Y BOTÓN VER PROYECTOS --------------------------------->

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
            <div class="container-fluid">
                <div class="table-responsive">
                    <table id="tablaDinamica" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <!-- <th class="col-1 bg-secondary text-light align-middle">Id. Sub.</th>
                                <th class="col-1 bg-secondary text-light align-middle">Id. Proy.</th> -->
                                <th class="col-5 bg-secondary text-light align-middle">Descripción</th>
                                <th class="d-none col-1 bg-secondary text-light text-center align-middle">Importe concedido</th>
                                <th class="col-1 bg-secondary text-light text-center align-middle">Importe concedido</th>
                                <th class="col-1 bg-secondary text-light text-center align-middle">Organismo</th>
                                <th class="col-2 bg-secondary text-light text-center align-middle">Estado</th>
                                <th class="col-2 bg-secondary text-light text-center align-middle">Cambiar fase</th>
                                <th class="col-2 bg-secondary text-light text-center align-middle">Acción</th>
                                <th class="col-2 bg-secondary text-light text-center align-middle">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($resultados as $posicion => $columna) { ?>
                                <tr class='<?php echo color_estado($miPDO, $columna["id_subvenciones"]); ?>'>
                                    <td class="align-middle"><?= $columna['descripcion_subvenciones'] ?></td>
                                    <td class="d-none text-end align-middle"><?= $columna['importe_concedido'] ?></td>
                                    <td class="text-end align-middle"><?= $columna['ImporteConcedido_formt'] ?></td>
                                    <td class="text-center align-middle"><?= $columna['tipo_de_organismo'] ?></td>
                                    <td class="text-center align-middle"><?= $columna['estado_subvencion'] ?></td>
                                    <td class="align-middle">
                                        <form action="./includes/templates/estado_subvencion.php" method="GET">
                                            <div class="input-group">
                                                <select class="form-control" aria-label="Estado de la subvencion" name="estado_subvencion" id="estado_subvencion" required>
                                                    <option value="Planteada">Planteada</option>
                                                    <option value="Presentada">Presentada</option>
                                                    <option value="Provisional">Provisional</option>
                                                    <option value="Definitiva">Definitiva</option>
                                                    <option value="Justificada">Justificada</option>
                                                </select>
                                                <span class="input-group-btn">
                                                    <input name="id_subvenciones" type="hidden" value='<?php echo $columna['id_subvenciones']; ?>' />
                                                    <button type="submit" class="btn btn-outline-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                                            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                                        </svg></button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-warning text-dark align-middle text-center" href="./includes/templates/modificar_subvencion.php?id_subvenciones=<?= $columna['id_subvenciones'] ?>" role="button">
                                            Modificar
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-danger align-middle text-center" href="./includes/templates/eliminar_subvencion.php?id_subvenciones=<?= $columna['id_subvenciones'] ?>" role="button">
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