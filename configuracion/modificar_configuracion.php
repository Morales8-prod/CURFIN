

    <?php

    require '../includes/config/database.php';

    include '../includes/funciones.php';

    // Comprobamos si recibimos datos por POST

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recogemos variables

        $valor = isset($_REQUEST['valor']) ? $_REQUEST['valor'] : null;
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
 

        // Funcion para modificar subvenciones

        modificar_configuracion($miPDO, $id, $valor);

       echo "<script type='text/javascript'>
       window.location.href = './index.php';
    </script>";
    }

    ?>


