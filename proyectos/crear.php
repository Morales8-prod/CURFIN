<!DOCTYPE html>
<html lang="es">

<head>
    <title>Formulario para añadir subvenciones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
    body {
        background-color: #F2F2F2;
        font-family: Arial, sans-serif;
    }

    .container {
        background-color: #FFFFFF;
        border-radius: 20px;
        box-shadow: 0px 0px 10px #BFBFBF;
        padding: 50px;
        margin: 50px auto;
    }

    h2 {
        color: #1A1A1A;
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 50px;
        text-align: center;
    }

    label {
        color: #1A1A1A;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="number"] {
        background-color: #F8F8F8;
        border-radius: 10px;
        border: none;
        color: #1A1A1A;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 30px;
        padding: 15px;
        width: 100%;
        box-shadow: none;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
        background-color: #FFFFFF;
        box-shadow: 0px 0px 5px #BFBFBF;
    }

    button[type="submit"] {
        background-color: #21C287;
        border: none;
        border-radius: 10px;
        color: #FFFFFF;
        font-size: 18px;
        font-weight: bold;
        padding: 15px 30px;
        transition: all 0.4s ease;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #1C9E73;
        cursor: pointer;
    }
</style>

</head>

<body>

    <?php
    // Comprobamos si recibimos datos por POST

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recogemos variables

        $titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
        $nota = isset($_REQUEST['nota']) ? $_REQUEST['nota'] : null;


        require './includes/config/database.php';

        // Prepara SELECT

        $miConsulta = $miPDO->prepare("INSERT INTO series VALUES (default, '$titulo', '$nota');");

        //Ejecuta consulta

        $miConsulta->execute();

        $resultados = $miConsulta->fetchAll();

        header("Location: index.php");
    }

    ?>

<div class="container">
    <form method="POST">
        <h2>Formulario para añadir un nuevo proyecto</h2>
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" placeholder="Nombre del proyecto">
        </div>
        <div class="form-group">
            <label>Importe</label>
            <input type="number" name="nota" placeholder="Importe del proyecto">
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>