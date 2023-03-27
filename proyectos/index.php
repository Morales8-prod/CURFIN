<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Subvenciones</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- FUENTES DE GOOGLE -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
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
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-3"><span>PROYECTOS</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.html"><i class="fas fa-tachometer-alt"></i><span>Panel de Control</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.html"><i class="fas fa-user"></i><span>Usuario</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-table"></i><span>Subvenciones</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Acceder</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Registrar</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form method="POST" class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" name="buscar" placeholder="Buscar proyecto"><button class="btn btn-primary py-0" type="submit"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Buscar...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Nombre usuario</span><img class="border rounded-circle img-profile" src=""></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Proyectos</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generar Informe</a>
                    </div>
                    <div class="row">
                        <div class="container-fluid">
                            <form method="POST">
                                <div class="form-group">
                                    <a class="btn btn-primary mt-3 mb-3" href="./includes/templates/crear_subvencion.php" role="button">Añadir proyecto</a>
                                    <a class="btn btn-success mt-3 mb-3" href="../index.php" role="button">Ver subvenciones</a>
                                    <?php include '../includes/templates/buscar_subvencion.php';
                                    if ($resultados_buscar) {
                                        echo '<a class="btn btn-light border-dark mt-3 mb-3" href="index.php" role="button">Limpiar pantalla</a>';
                                    }; ?>
                                </div>
                            </form>
                        </div>
                        <!------------------------- FIN BOTÓN AÑADIR SUBVENCIÓN Y CAMPO BUSCAR SUBVENCIÓN ----------------------------->

                        <?php

                        require 'includes/config/database.php';

                        // ------------- INCIO RECOGEMOS LOS DATOS DE TODAS LAS SUBVENCIONES Y LOS GUARDO EN $resultados -----------

                        // Prepara SELECT

                        $miConsulta = $miPDO->prepare('SELECT * FROM series ORDER BY id_serie ASC;');

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
                                        <th class="col-1 bg-secondary text-light text-center align-middle">Importe</th>
                                        <th class="col-1 bg-secondary text-light text-center align-middle">Cofinanciación</th>
                                        <th class="col-1 bg-secondary text-light text-center d-none d-sm-table-cell align-middle">Acción</th>
                                        <th class="col-1 bg-secondary text-light text-center d-none d-sm-table-cell align-middle">Acción</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($resultados as $posicion => $columna) : ?>
                                        <tr>
                                            <td class="col-1 align-middle"><?= $columna['id_serie'] ?></td>
                                            <td class="col-1 align-middle"><?= $columna['id_serie'] ?></td>
                                            <td class="col-7 align-middle"><?= $columna['titulo'] ?></td>
                                            <td class="col-1 align-middle"><?= $columna['nota'] ?></td>
                                            <td class="col-1 align-middle"><?= $columna['nota'] ?></td>
                                            <td class="d-none d-sm-table-cell align-middle">
                                                <a class="btn btn-warning text-dark" href="./modificar.php?id_serie=<?= $columna['id_serie'] ?>" role="button">Modificar</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell align-middle">
                                                <a class="btn btn-danger" href="./eliminar.php?id_serie=<?= $columna['id_serie'] ?>" role="button">Ocultar</a>
                                            </td>
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
    $(document).ready(function() {
        $('#tablaDinamica').DataTable();
    });
</script>

</html>